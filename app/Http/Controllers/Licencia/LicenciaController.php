<?php

namespace App\Http\Controllers\Licencia;

use App\Licencia;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LicenciaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licencias = Licencia::all();
        return $this->showAll($licencias);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licencia = Licencia::findOrFail($id);
        return $this->showOne($licencia);
    }
}
