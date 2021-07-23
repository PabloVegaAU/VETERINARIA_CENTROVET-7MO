<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name' => 'required|max:100|string',
            'password' => 'required|max:100',
            'apellido' => 'required|max:100',
            'celular' => 'required|digits:9',
            'dni' => 'required|digits:8|integer|unique:clientes',
            'email' => 'required|email|max:100|unique:clientes',
            'edad' => 'required|max:3',
            'sexo' => 'required|max:100',
            'tipo'=>'required',
            'fecha_nac' => 'required|date',
            'domicilio' => 'required|max:100'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'apellido' => $request->apellido,
            'celular' =>$request->celular,
            'dni' => $request->dni,
            'fecha_nac' => $request->fecha_nac,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'tipo'=>$request->tipo,
            'domicilio' =>$request->dni,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($users)
    {
        $user = User::Find($users);
        return view('admin.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,$user)
    {
    $userD = User::Find($user);
            $leve=[
                'celular'=>'required|digits:9|integer',
                'tipo'=>'required',
                'fecha_nac' => 'required|date',
                'edad'=>'required|integer|max:125|min:18',
                'sexo'=>'required|string',
                'domicilio'=>'required|string'];
            $request->validate($leve);


        //actualiza solo el modelo user
        $userD->update($request->all());

       return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $userD = User::Find($user);
        $userD->delete();
        return redirect()->route('admin.users.index')->with('msg','El usuario ha sido eliminado correctamente');
    }
}
