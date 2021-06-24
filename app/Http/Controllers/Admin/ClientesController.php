<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Clientes $clientes)
    {
        return var_dump($clientes);
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
    public function update(Request $request, Clientes $clientes)
    {
        $leve = ['dni' => 'required|digits:8|integer',
                'nombre'=>'required|string|between:1,20',
                'apellido'=>'required'
        ];
        $estricto= ['dni' => 'required|digits:8|unique:doctors|integer',
        'nombre'=>'required|string|between:1,20',
        'apellido'=>'required'
        ];
        if ($request->dni == $cliente->dni) { //si el n_cmp son iguales a los que se enviaron
            $request->validate($leve);
        } else {
            $request->validate($estricto);
        }

        //actualiza solo el modelo doctor
        $clientes->update($request->only("dni"));
        $clientes->update($request->only("nombre","apellido"));
        //actualiza solo el modelo user
        $clientes->user->update($request->only("name"));

        return redirect()->route('admin.clientes.edit', $clientes)
        ->with('mensaje','Cliente '.$clientes->nombre.' se editó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        $cliente = Clientes::Find($clientes);
        return response()->json($cliente);
        /* $cliente->delete();
        return redirect()->route('admin.clientes.index'); */
    }
}
