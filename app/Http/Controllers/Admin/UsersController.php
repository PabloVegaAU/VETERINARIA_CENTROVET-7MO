<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Clientes;
use App\Models\Mascotas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        /* $request->validate([
            'dni' => 'required|unique:clientes|digits:8|integer',
            'name1' => 'required|max:100',
            'apellido1' => 'required|max:100',
            'email' => 'required|email|max:100',
            'celular' => 'required|digits:9',
            'edad' => 'required|max:3',
            'sexo' => 'required|max:100',
            'domicilio' => 'required|max:100',
        ]); */
        Validator::make($input, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'apellido' => ['required', 'string', 'max:100'],
            'edad' => ['required', 'int', 'max:110', 'min:1'],
            'celular' => ['required', 'string', 'max:100'],
            'dni' => ['required','digits:8','numeric', 'unique:clientes'],
            'fecha_nac' => ['required'],
            'sexo' => ['required'],
            'domicilio' => ['required', 'string', 'max:100'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        Clientes::create([
            'nombre' => $user->name,
            'apellido' => $input['apellido'],
            'celular' => $input['dni'],
            'dni' => $input['dni'],
            'fecha_nac' => $input['fecha_nac'],
            'edad' => $input['edad'],
            'sexo' => $input['sexo'],
            'domicilio' => $input['dni'],
            'user_id' => $user->id,
        ]);
        return view('admin.users.index');
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
                'email' =>'required|string|email|max:100',
                'celular'=>'required|digits:9|integer',
                'fecha_nac'=>'required',
                'edad'=>'required|digits:2|integer',
                'sexo'=>'required|string',
                'domicilio'=>'required|string'];
            $request->validate($leve);


        //actualiza solo el modelo user
        $userD->update(['email'=>$request->email]);
        //actualiza solo el modelo profile
        $userD->clientes->update($request->only("celular","fecha_nac","edad","sexo"));

       return redirect()->route('admin.users.edit',$userD);

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
