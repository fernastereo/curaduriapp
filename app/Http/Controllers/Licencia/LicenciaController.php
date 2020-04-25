<?php

namespace App\Http\Controllers\Licencia;

use App\Licencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licencias = Licencia::all();
        return response()->json(['data' => $licencias], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licencias = Licencia::findOrFail($id);
        return response()->json(['data' => $licencias], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
