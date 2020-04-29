<?php

namespace App\Http\Controllers\Ciudad;

use App\Ciudad;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CiudadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudads = Ciudad::all();
        return $this->showAll($ciudads);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return $this->showOne($ciudad);
    }
}
