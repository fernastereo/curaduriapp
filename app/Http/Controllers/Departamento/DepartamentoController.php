<?php

namespace App\Http\Controllers\Departamento;

use App\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DepartamentoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::all();
        return $this->showAll($departamentos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::findOrFail($id);
        return $this->showOne($departamento);
    }
}
