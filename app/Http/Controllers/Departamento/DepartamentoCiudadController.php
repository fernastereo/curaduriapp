<?php

namespace App\Http\Controllers\Departamento;

use App\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class DepartamentoCiudadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Departamento $departamento)
    {
        $ciudads = $departamento->ciudads;
        return $this->showAll($ciudads);
    }
}
