<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consultas;
use App\Models\Mascotas;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consultas::all();
        return view('admin.consultas.index',compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascotas = Mascotas::all();
        return view('admin.consultas.create',compact('mascotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'sintomas' => 'required|max:100',
            'diagnosticos' => 'required|max:100',
            'mascotas' => 'required'
        ]);

        $consultas = Consultas::Create($request->all());
        foreach ($request->mascotas as $mid) {
            $consultasN =Consultas::Find($consultas->id);
            $consultasN->update(['mascotas_id'=>$mid]);
        }
        return redirect()->route('admin.consultas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function show(Consultas $consultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function edit($consultas)
    {
        $consulta = Consultas::Find($consultas);
        return view('admin.consultas.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$consultas)
    {
        $consultaD = Consultas::Find($consultas);
            $leve=[
                'fecha'=>'required|date',
                'sintomas'=>'required|string',
                'diagnosticos'=>'required|string'];
            $request->validate($leve);

        //actualiza solo el modelo user
        $consultaD->update($request->all());

        return redirect()->route('admin.consultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultas  $consultas
     * @return \Illuminate\Http\Response
     */
    public function destroy($consultas)
    {
        $consultaD = Consultas::Find($consultas);
        $consultaD->delete();
        return redirect()->route('admin.consultas.index');
    }
}
