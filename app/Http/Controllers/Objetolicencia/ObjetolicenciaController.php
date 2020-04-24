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
        return response()->json(['data' => $objetoLicencias], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objetoLicencias = Objetolicencia::findOrFail($id);
        return response()->json(['data' => $objetoLicencias], 200);
    }
}
