@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVO CLIENTE </h1>
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
<div class="container">
    {!! Form::open(['method' => 'POST', 'route' => 'admin.users.store']) !!}
    <div class="row">
        <div class="form-group col-sm">
            {!! Form::label('name', 'Nombres') !!}
            {!! Form::text('name', null, ['id'=>'name', 'name'=>'name','class'=>
            'form-control','placeholder'=>'Nombres'])
            !!}
        </div>
        <div class="form-group col-sm">
            {!! Form::label('apellido', 'Apellidos') !!}
            {!! Form::text('apellido', null, ['id'=>'apellido', 'name'=>'apellido','class'=>
            'form-control','placeholder'=>'Apellidos']) !!}
        </div>
        <div class="form-group col-sm">
            {!! Form::label('dni', 'N° DNI') !!}
            <div style="display: flex">
                {!! Form::text('dni', null, ['id'=>'dni', 'name'=>'dni','class'=>
                'form-control','placeholder'=>'N° de DNI']) !!}
                <input type="button" class="btn btn-warning" onclick="consultar()" value="Validar">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::text('email', null, ['type'=>'email','class'=>'form-control','placeholder'=>'Correo Electronico'])
            !!}
        </div>
        <div class="form-group col-sm">
            {!! Form::label('password', 'Contraseña') !!}<br>
            {!! Form::password('password', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm">
            {!! Form::label('fecha_nac', 'Fecha de nacimiento') !!}
            {!! Form::date('fecha_nac', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-sm">
            {!! Form::label('celular', 'N° Celular') !!}
            {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'N° Telefonico']) !!}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm">
            {!! Form::label('edad', 'Edad') !!}
            {!! Form::text('edad', null, ['class'=>'form-control','placeholder'=>'Edad']) !!}
        </div>
        <div class="form-group col-sm">
            {!! Form::label('sexo', 'Sexo') !!}
            {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), null, ['class' =>
            'form-control']) !!}
        </div>
        <div class="form-group col-sm">
            {!! Form::label('tipo', 'Tipo') !!}
            {!!
            Form::select('tipo',array('VETERINARIO'=>'VETERINARIO','RECEPCIONISTA'=>'RECEPCIONISTA'),
            null, ['class' =>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('domicilio', 'Domicilio') !!}
        {!! Form::text('domicilio', null, ['class'=>'form-control','placeholder'=>'Domicilio']) !!}
    </div>
    <div class="form-group" align="center">
        {!! Form::submit("Añadir", ['class' => 'btn btn-warning']) !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('js')
<script src="{{ asset('vendor/js/api_dni2,js')}}"></script>
@stop
