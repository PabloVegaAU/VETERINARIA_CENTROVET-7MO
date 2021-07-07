<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Mascotas;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Clientes::all();
        return view('admin.clientes.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mascotas = Mascotas::all();
        return view('admin.clientes.create', compact('mascotas'));
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
            'apellido' => 'required|max:100',
            'celular' => 'required|digits:9',
            'dni' => 'required|digits:8|integer|unique:clientes',
            'email' => 'required|email|max:100|unique:clientes',
            'edad' => 'required|max:3',
            'sexo' => 'required|max:100',
            'fecha_nac' => 'required',
            'domicilio' => 'required|max:100'
        ]);

        $cliente = Clientes::Create($request->all());

        return redirect()->route('admin.clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($clientes)
    {
        $clientes = Clientes::Find($clientes);
        $mascotas = Mascotas::all();
        return view('admin.clientes.edit', compact('clientes','mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientes)
    {
        $clienteD = Clientes::Find($clientes);

            $leve=[
                'email' =>'required|string|email|max:100',
                'celular'=>'required|digits:9|integer',
                'fecha_nac'=>'required',
                'edad'=>'required|integer|min:18|max:120',
                'sexo'=>'required|string',
                'domicilio'=>'required|string'
            ];
            $request->validate($leve);

        //actualiza cliente
        $clienteD->update($request->all());

        return redirect()->route('admin.clientes.edit',$clienteD);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientes)
    {
        $cliente = Clientes::Find($clientes);
        $cliente->delete();
        return redirect()->route('admin.clientes.index');
    }
}
