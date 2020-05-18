<?php

namespace App\Http\Controllers\Curaduria;

use App\Curaduria;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class CuraduriaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curadurias = Curaduria::all();
        return $this->showAll($curadurias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->emailsolicitudes;

        $rules = [
            'ciudad_id'             => 'integer|min:1',
            'numero'                => 'integer|min:1',
            'email'                 => 'required|email',
            'emailsolicitudes'      => 'required|email',
            'curador'               => 'required',
            'direccion'             => 'required',
            'telefono'              => 'required'
        ];

        $this->validate($request, $rules);

        $curaduria = Curaduria::create([
            'ciudad_id' => $request->ciudad_id,
            'numero' => $request->numero,
            'curador' => $request->curador,
            'idcurador' => $request->idcurador,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'web' => $request->web,
            'emailsolicitudes' => $request->emailsolicitudes,
            'responsesolicitudes' => $request->responsesolicitudes,
            'fechaini' => $request->fechaini,
            'estado'  => Curaduria::CURADURIA_ACTIVA,
            'bucket' => $request->bucket,
            'logo' => $request->logo->store('', 'public'),
        ]);

        return $this->showOne($curaduria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curaduria = Curaduria::findOrFail($id);
        return $this->showOne($curaduria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curaduria $curaduria)
    {
        $rules = [
            'ciudad_id'             => 'integer|min:1',
            'numero'                => 'integer|min:1',
            'email'                 => 'email',
            'emailsolicitudes'      => 'email',
        ];

        $this->validate($request, $rules);

        if ($request->has('ciudad_id')) {
            $curaduria->ciudad_id = $request->ciudad_id;
        }
        if ($request->has('numero')) {
            $curaduria->numero = $request->numero;
        }
        if ($request->has('email')) {
            $curaduria->email = $request->email;
        }
        if ($request->has('emailsolicitudes')) {
            $curaduria->emailsolicitudes = $request->emailsolicitudes;
        }
        if ($request->has('bucket')) {
            $curaduria->bucket = $request->bucket;
        }
        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($curaduria->logo);
            $curaduria->logo = $request->file('logo')->store('', 'public');
        }

        if (!$curaduria->isDirty()) {  //isDirty() negado es lo mismo que isClean()
            //return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar', 'code' => 422], 422);
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $curaduria->save();

        return $this->showOne($curaduria);

    }
}
