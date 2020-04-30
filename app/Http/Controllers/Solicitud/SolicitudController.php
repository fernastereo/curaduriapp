<?php

namespace App\Http\Controllers\Solicitud;

use App\Solicitud;
use App\Solicitante;
use App\Solicitudanexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicituds = Solicitud::all();
        return $this->showAll($solicituds);
    }

    /**
     * Actualiza la solicitud como verificada colocando en null el campo token y envia la solcitud via email a la curaduria respectiva.
     *
     * @return \Illuminate\Http\Response
     */
    public function verify($token)
    {
        return $this->errorResponse("Token recibido: {$token}. Metodo Verify del controlador", 422);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('anexos');
        
        $rules = [
            'objetolicencia_id'         => 'required',
            'licenciaanteriornumero'    => 'nullable|numeric|max:4',
            'licenciaanteriorvigencia'  => 'nullable|numeric|max:4',
            'modalidad_id'              => 'required|numeric',
            'solidentificacion'         => 'required|numeric',
            'solnombre'                 => 'required',
            'soltelefono'               => 'required',
            'solemail'                  => 'required|email',
            'descripcion'               => 'nullable',
            // 'anexos'                    => 'array'
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();
        try{
            // $id = Solicitante::where('identificacion', $request->solidentificacion)->get();
            
            $solicitante = Solicitante::create([
                'identificacion' => $request->has('solidentificacion') ? $request->solidentificacion : null,
                'nombre' => $request->has('solnombre') ? $request->solnombre : null,
                'telefono' => $request->has('soltelefono') ? $request->soltelefono : null,
                'email' => $request->has('solemail') ? $request->solemail : null,
            ]);
            
            $solicitud = Solicitud::create([
                'curaduria_id' => $request->has('curaduria_id') ? $request->curaduria_id : null,
                'objetolicencia_id' => $request->has('objetolicencia_id') ? $request->objetolicencia_id : null,
                'licenciaanteriornumero' => $request->has('licenciaanteriornumero') ? $request->licenciaanteriornumero : null,
                'licenciaanteriorvigencia' => $request->has('licenciaanteriorvigencia') ? $request->licenciaanteriorvigencia : null,
                'modalidad_id' => $request->has('modalidad_id') ? $request->modalidad_id : null,
                'descripcion' => $request->has('descripcion') ? $request->descripcion : null,
                'solicitante_id' => $solicitante->id,
                'token' => str_random(50)
            ]);

            $anexos = $request->has('anexos') ? $request->file('anexos') : null;
            
            foreach ($anexos as $anexo) {
                /*Para enviar a S3: 
                Crear usuario en AWS y asignarles las policies hacia el bucket (copiar de otro)
                instalar esto: composer require league/flysystem-aws-s3-v3
                En config/filesystem declarar el bucket
                En .env colocar las credenciales
                */
                $storagePath = Storage::disk('solicitudfiles')->put($solicitud->curaduria->bucket, $anexo, 'public');
                //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
                $url = Storage::url($storagePath);
                //Guardo la ruta obtenida en el paso anterior en la BD para poder referenciarla
                $document = new Solicitudanexo();
                $document->file = $url;
                $document->solicitud_id = $solicitud->id;
                $document->save();

                //$document->filename = $url;
            }

            DB::commit();
        
        }catch(\Exception $e){
            DB::rollback();
            return $this->errorResponse('warning,Something Went Wrong!' . $e->getMessage(), 500);
        }   

        return $this->showOne($solicitud, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        $data = $solicitud::where('id', $solicitud->id)->with('solicitante')->with('solicitudanexos')->get();
        return $this->showAll($data);
    }
}
