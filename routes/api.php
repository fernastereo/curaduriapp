<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     //Middleware auth y guard api
//     return $request->user();
// });


/* 
Ciudades
*/
Route::resource('ciudads', 'Ciudad\CiudadController', ['only' => ['index', 'show']]);

/* 
Curadurias
*/
Route::resource('curadurias', 'Curaduria\CuraduriaController', ['except' => ['create', 'edit', 'destroy']]);

/*
Departamentos
*/
Route::resource('departamentos', 'Departamento\DepartamentoController', ['only' => ['index', 'show']]);

/* 
EstadoExpediente
*/
Route::resource('estadoexpedientes', 'Estadoexpediente\EstadoexpedienteController', ['only' => ['index', 'show']]);

/* 
Expedientes
*/
Route::resource('expedientes', 'Expediente\ExpedienteController', ['only' => ['index', 'show']]);

/* 
Objetolicencia
*/
Route::resource('objetolicencias', 'Objetolicencia\ObjetolicenciaController', ['only' => ['index', 'show']]);

/* 
Users
*/
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);



