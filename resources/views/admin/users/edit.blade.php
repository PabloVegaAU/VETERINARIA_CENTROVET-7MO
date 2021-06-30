@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>EDITAR USUARIO: {{$user->name}}</h1>

@stop

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', $user->name, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('apellido', 'Apellidos') !!}
                {!! Form::text('apellido', $user->apellido, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('dni', 'DNI') !!}
                {!! Form::text('dni', $user->dni, ['class' => 'form-control','disabled']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('celular', 'N° de Celular') !!}
                {!! Form::text('celular', $user->celular, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
                {!! Form::date('fecha_nac', $user->fecha_nac, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('edad', 'Edad') !!}
                {!! Form::text('edad', $user->edad, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('sexo', 'Sexo') !!}
                {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), $user->sexo, ['class' =>
                'form-control']) !!}
            </div>
        </div>
        <div class="form-group col-sm">
            {!! Form::label('domicilio', 'Domicilio') !!}
            {!! Form::text('domicilio', $user->domicilio, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group col-sm" align="center">
        {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop
