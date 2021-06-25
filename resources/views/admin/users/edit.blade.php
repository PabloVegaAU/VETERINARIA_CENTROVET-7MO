@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Editar a {{$user->nombre}}</h1>

@stop

@section('content')
<div class="card">
    <div class="card-body">


        {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) !!}

        <div class="form-group">

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', $user->clientes->nombre, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellido', 'Apellidos') !!}
                {!! Form::text('apellido', $user->clientes->apellido, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('celular', 'N° de Celular') !!}
                {!! Form::text('celular', $user->clientes->celular, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('dni', 'DNI') !!}
                {!! Form::text('dni', $user->clientes->dni, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
                {!! Form::date('fecha_nac', $user->clientes->fecha_nac, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('edad', 'Edad') !!}
                {!! Form::text('edad', $user->clientes->edad, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sexo', 'Sexo') !!}
                {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), $user->clientes->sexo, ['class' =>
                'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('domicilio', 'Domicilio') !!}
                {!! Form::text('domicilio', $user->clientes->domicilio, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group" align="center">
            {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        console.log('Hola!');
    </script>
    @stop
