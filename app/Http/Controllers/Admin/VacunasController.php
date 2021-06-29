<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacunas;
class VacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacunas = Vacunas::all();
        return view('admin.vacunas.index',compact('vacunas'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacunas = Vacunas::Find($id);
        return view('admin.vacunas.edit', compact('vacunas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vacunaD = Vacunas::Find($id);
            $leve=[
                'vacuna'=>'required|max:30|string',
                'fechaprogramada'=>'required|date',
                'fechaaplicada'=>'required|date'];
            $request->validate($leve);

        //actualiza solo el modelo user
        $vacunaD->update($request->all());

        return redirect()->route('admin.vacunas.edit',$vacunaD);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacunaD = Vacunas::Find($id);
        $vacunaD->delete();
        return redirect()->route('admin.users.index')->with('msg','La vacuna ha sido eliminado correctamente');
    }
}
