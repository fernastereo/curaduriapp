<?php

namespace App\Http\Controllers\Modalidad;

use App\Modalidad;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ModalidadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modalidads = Modalidad::all();
        return $this->showAll($modalidads);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modalidad = Modalidad::findOrFail($id);
        return $this->showOne($modalidad);
    }
}
