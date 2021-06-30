<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mascotas;
use App\Models\Clientes;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascotas::all();
        return view('admin.mascotas.index',compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view('admin.mascotas.create',compact('clientes'));
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
            'nombre' => 'required|max:100',
            'especie' => 'required|max:100',
            'raza' => 'required|max:100',
            'sexo' => 'required|max:100',
            'clientes' => 'required'
        ]);

        $mascotas = Mascotas::Create($request->all());
        foreach ($request->clientes as $mid) {
            $mascotaM =Mascotas::Find($mascotas->id);
            $mascotaM->update(['clientes_id'=>$mid]);
        }
        return redirect()->route('admin.mascotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function show(Mascotas $mascotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function edit($mascota)
    {
        $mascotas = Mascotas::Find($mascota);
        $clientes = Clientes::all();
        return view('admin.mascotas.edit', compact('mascotas','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mascota)
    {
        $mascotaD = Mascotas::Find($mascota);

            $leve=[
                'nombre'=>'required|string',
                'especie'=>'required|string',
                'raza'=>'required|string',
                'sexo'=>'required|string',
                'clientes_id'=>'required'
            ];
            $request->validate($leve);

            //actualiza cliente
            $mascotaD->update($request->except('clientes_id'));
            $mascotaD->update(['clientes_id'=>$request->clientes_id]);
            return redirect()->route('admin.mascotas.edit',$mascotaD);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mascotas  $mascotas
     * @return \Illuminate\Http\Response
     */
    public function destroy($mascotas)
    {
        $mascota = Mascotas::Find($mascotas);
        $mascota->delete();
        return redirect()->route('admin.mascotas.index');
    }
}
