<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservaciones;
use App\Models\Clientes;
use App\Models\User;
use Illuminate\Http\Request;

class ReservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservaciones = Reservaciones::all();
        return view('admin.reservaciones.index',compact('reservaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        $usuarios = User::all();
        return view('admin.reservaciones.create',compact('clientes','usuarios'));
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
            'hora' => 'required',
            'comentario' => 'required|string|max:100',
            'clientes' => 'required',
            'users_id' => 'required',
        ]);

        $reservacion = Reservaciones::Create($request->all());

        foreach ($request->clientes as $mid) {
            $reservacionM =Reservaciones::Find($reservacion->id);
            $reservacionM->update(['clientes_id'=>$mid]);
        }

        return redirect()->route('admin.reservaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function show($reservaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($reservaciones)
    {
        $reservaciones = Reservaciones::find($reservaciones);
        $clientes = Clientes::all();
        $usuarios = User::all();
        return view('admin.reservaciones.edit',compact('reservaciones','clientes','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reservaciones)
    {
        $reservacionD = Reservaciones::Find($reservaciones);

        $leve=[
            'fecha' => 'required|date',
            'hora' => 'required',
            'estado'=>'required',
            'comentario' => 'required|string|max:100',
            'comentario'=>'required|string',
            'clientes_id'=>'required',
            'users_id'=>'required'
        ];
        $request->validate($leve);
        //actualiza reservación
        $reservacionD->update($request->all());
        return redirect()->route('admin.reservaciones.edit',$reservacionD);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($reservaciones)
    {
        $reservacionD = Reservaciones::Find($reservaciones);
        $reservacionD->delete();
        return redirect()->route('admin.reservaciones.index');
    }
}
