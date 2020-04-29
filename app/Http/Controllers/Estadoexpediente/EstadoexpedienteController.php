<?php

namespace App\Http\Controllers\Estadoexpediente;

use App\Estadoexpediente;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class EstadoexpedienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoexpedientes = Estadoexpediente::all();
        return $this->showAll($estadoexpedientes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoexpediente = Estadoexpediente::findOrFail($id);
        return $this->showOne($estadoexpediente);
    }
}
