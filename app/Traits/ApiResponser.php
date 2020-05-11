<?php

namespace App\Traits;

//use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

trait ApiResponser{

  private function successResponse($data, $code){
    //Metodo encargado de construir respuestas satisfacotrias
    //recibe la informacion a retornar y el codigo de la respuesta
    return response()->json($data, $code);
  }

  protected function errorResponse($message, $code){
    //Metodo encargado de mostrar respuestas de error
    return response()->json(['error' => $message, 'code' => $code], $code);
  }

  protected function showAll(Collection $collection, $code = 200){
    //Muestra una respuesta con multiples elementos
    return $this->successResponse($collection, $code);
  }

  protected function showOne(Model $instance, $code = 200){
    //Muestra respuesta para una unica instancia
    return $this->successResponse($instance, $code);
  }

  protected function showMessage($message, $code = 200){
    //Muestra respuesta para una unica instancia
    return $this->successResponse($message, $code);
  }
}