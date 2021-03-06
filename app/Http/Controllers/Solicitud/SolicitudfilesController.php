<?php

namespace App\Http\Controllers\Solicitud;

use App\Curaduria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SolicitudfilesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Probar este metodo creandolo en un controlador aparte para comporbar si es por eso que devuelve el error 
        try{
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
            $storagePath = Storage::disk('solicitudfiles')->put('solicituds_files/' . $folder, $archivo, 'public');
            
            //Guardo la url completa para acceder al archivo dentro del bucket en la variable $url
            $url = Storage::url($storagePath);
            $data['success'] = 'success';
            $data['path'] = $url;
        }catch(\Exception $e){
            return $this->errorResponse('warning, Something Went Wrong!' . $e->getMessage(), 500);
        }   

        return $data;
    }
}
