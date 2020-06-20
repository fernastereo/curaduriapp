<?php

namespace App\Http\Controllers\Solicitud;

use App\Curaduria;
use App\Solicitud;
use App\Solicitante;
use App\Solicitudanexo;
use App\Mail\SolicitudSaved;
use Illuminate\Http\Request;
use App\Mail\SolicitudResponse;
use App\Mail\SolicitudVerified;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
        $solicitud = Solicitud::where('token', $token)->firstOrFail();
        $solicitud->token = null;
        $solicitud->save();

        /*Aqui debe enviar dos mails
        Uno para la curaduria con la informacion de la solicitud
        Otro para el solicitante confirmando que fue recibida.
        */
        Mail::to($solicitud->curaduria->emailsolicitudes)->send(New SolicitudVerified($solicitud));
        Mail::to($solicitud->solicitante->email)->send(New SolicitudResponse($solicitud));

        return view('solicitud.confirmed', ['solicitud' => $solicitud]);
    }

    /**
     * Reenvía el correo para verificar el email de la solicitud
     *
     * @return \Illuminate\Http\Response
     */
    public function resend(Solicitud $solicitud)
    {
        if ($solicitud->token == null) {
            return $this->errorResponse('Esta solicitud ya fue verificada', 409);
        }

        Mail::to($solicitud->solicitante->email)->send(New SolicitudSaved($solicitud));

        return $this->showMessage('El correo de verificación ha sido enviado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
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
        ];

        $this->validate($request, $rules);

        DB::beginTransaction();
        try{
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

            // $anexos = $request->has('anexos') ? $request->file('anexos') : null;
            $anexos = $request->has('anexos') ? $request->anexos : null;
            
            foreach ($anexos as $anexo) {
                /*Para enviar a S3: 
                Crear usuario en AWS y asignarles las policies hacia el bucket (copiar de otro)
                instalar esto: composer require league/flysystem-aws-s3-v3
                En config/filesystem declarar el bucket
                En .env colocar las credenciales
                */
                // $storagePath = Storage::disk('solicitudfiles')->put('solicituds_files/' . $solicitud->curaduria->bucket . '/tmp', $anexo, 'public');
                //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
                // $url = Storage::url($storagePath);
                //Guardo la ruta obtenida en el paso anterior en la BD para poder referenciarla
                $document = new Solicitudanexo();
                $document->file = $anexo['path'];
                $document->solicitud_id = $solicitud->id;
                $document->save();
            }
            DB::commit();
            Mail::to($solicitud->solicitante->email)->send(New SolicitudSaved($solicitud));
            
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

    /**
     * Upload a file on temporary folder in the S3 bucket
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        
            $id = $request->has('id') ? $request->id : null;
            $folder = $request->has('folder') ? $request->folder : null;
            $archivo = $request->has('archivo') ? $request->file('archivo') : null;
            
            $curaduria = Curaduria::findOrFail($id);
            $folder = $curaduria->bucket . '/' . $folder;
            /*Para enviar a S3: 
            Crear usuario en AWS y asignarles las policies hacia el bucket (copiar de otro)
            instalar esto: composer require league/flysystem-aws-s3-v3
            En config/filesystem declarar el bucket
            En .env colocar las credenciales
            */
            // $storagePath = Storage::disk('solicitudfiles')->put('solicituds_files/' . $folder, $archivo, 'public');
            
            //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
            // $url = Storage::url($storagePath);
            $data['success'] = 'success';
            // $data['path'] = $url;
        // }catch(\Exception $e){
        //     return $this->errorResponse('warning, Something Went Wrong!' . $e->getMessage(), 500);
        // }   

        return $data;

    }
}