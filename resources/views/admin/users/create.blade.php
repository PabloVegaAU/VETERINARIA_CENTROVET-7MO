@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVO USUARIO </h1>
@stop

@section('content')
<div class="form-group">
    {!! Form::open(['method' => 'POST', 'route' => 'admin.users.store']) !!}

    <div class="form-group">
        {!! Form::label('name1', 'Nombres') !!}
        {!! Form::text('name1', null, ['id'=>'name1', 'name'=>'name1','class'=>
        'form-control','placeholder'=>'Nombres'])
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('apellido1', 'Apellidos') !!}
        {!! Form::text('apellido1', null, ['id'=>'apellido1', 'name'=>'apellido1','class'=>
        'form-control','placeholder'=>'Apellidos']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dni1', 'N° DNI') !!}
        <div style="display: flex">
            <x-jet-input id="dni1" class="mt-1 w-100" type="text" :value="old('dni')" name="dni1" required />
            <input type="hidden" name="dni" id="dni" value="">
            <input type="button" class="btn btn-warning" onclick="consultar()" value="Validar">
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo electronico') !!}
        {!! Form::text('email', null, ['id'=>'email', 'name'=>'email','class'=>'form-control','placeholder'=>'Correo
        Electronico']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('celular', 'N° Celular') !!}
        {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'N° Telefonico']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sexo', 'Sexo') !!}
        {!! Form::text('sexo', null, ['class'=>'form-control','placeholder'=>'Sexo']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio') !!}
        {!! Form::text('domicilio', null, ['class'=>'form-control','placeholder'=>'Domicilio']) !!}
    </div>
    <div class="form-group" align="center">
        {!! Form::submit("Añadir", ['class' => 'btn btn-warning']) !!}
    </div>
</div>
{!! Form::close() !!}
@stop

@section('js')
<script src="{{ asset('vendor/js/api_dni,js')}}"></script>
@stop
