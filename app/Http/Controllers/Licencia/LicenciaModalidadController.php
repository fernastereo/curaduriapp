<?php

namespace App\Http\Controllers\Licencia;

use App\Licencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenciaModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Licencia $licencia)
    {
        $modalidads = $licencia->modalidads;
        return response()->json(['data' => $modalidads], 200);
    }
}
