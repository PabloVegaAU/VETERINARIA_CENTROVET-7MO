@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVO USUARIO </h1>
@stop

@section('content')
<div class="form-group">
    {!! Form::open(['method' => 'POST', 'route' => 'admin.users.store']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Nombres') !!}
        {!! Form::text('nombre', null, ['id'=>'nombre', 'name'=>'nombre','class'=>
        'form-control','placeholder'=>'Nombres'])
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('apellido', 'Apellidos') !!}
        {!! Form::text('apellido', null, ['id'=>'apellido', 'name'=>'apellido','class'=>
        'form-control','placeholder'=>'Apellidos']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('dni', 'N° DNI') !!}
        {!! Form::text('dni', null, ['id'=>'dni', 'name'=>'dni','class'=>
        'form-control','placeholder'=>'N° de DNI']) !!}
        <input type="button" class="btn btn-warning" onclick="consultar()" value="Validar">
    </div>
    <div class="form-group">
        {!! Form::label('celular', 'N° Celular') !!}
        {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'N° Telefonico']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_nac', 'Fecha de nacimiento') !!}
        {!! Form::date('fecha_nac', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('edad', 'Edad') !!}
        {!! Form::text('edad', null, ['class'=>'form-control','placeholder'=>'Edad']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sexo', 'Sexo') !!}
        {!! Form::text('sexo', null, ['class'=>'form-control','placeholder'=>'m/f']) !!}
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
