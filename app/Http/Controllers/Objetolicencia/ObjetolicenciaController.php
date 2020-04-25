<?php

namespace App\Http\Controllers\Objetolicencia;

use App\Objetolicencia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ObjetolicenciaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetoLicencias = Objetolicencia::all();
        return $this->showAll($objetoLicencias);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objetoLicencia = Objetolicencia::findOrFail($id);
        return $this->showOne($objetoLicencia);
    }
}
