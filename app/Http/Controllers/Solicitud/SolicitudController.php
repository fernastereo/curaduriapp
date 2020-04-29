<?php

namespace App\Http\Controllers\Solicitud;

use App\Solicitud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        return $this->showOne($solicitud);
    }
}
