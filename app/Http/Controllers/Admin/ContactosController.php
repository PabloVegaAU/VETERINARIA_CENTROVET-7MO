<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contactos;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contactos::all();
        return view('admin.contactos.index',compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contactos.create');
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
            'telefono' => 'required|digits:9',
            'email' => 'required|email|max:100|unique:clientes',
            'comentario' => 'required|max:100'
        ]);

        $contacto = Contactos::Create($request->all());

        return redirect()->route('admin.contactos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function show(Contactos $contactos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function edit($contactos)
    {
        $contacto = Contactos::Find($contactos);
        return view('admin.contactos.edit', compact('contacto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contactos)
    {
        $contactoD = Contactos::Find($contactos);

        $leve=[
            'nombre' =>'required|string|max:50',
            'apellido'=>'required|string|max:50',
            'telefono'=>'required|integer|digits:9',
            'email' =>'required|string|email|max:100',
            'comentario' =>'required|string|max:50'

        ];
        $request->validate($leve);

        //actualiza cliente
        $contactoD->update($request->all());

        return redirect()->route('admin.contactos.edit',$contactoD);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy($contactos)
    {
        $contactoD = Contactos::Find($contactos);
        $contactoD->delete();
        return redirect()->route('admin.contactos.index');
    }
}
