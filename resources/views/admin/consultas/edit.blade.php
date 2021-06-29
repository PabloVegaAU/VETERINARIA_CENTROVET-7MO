@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Editar del Cliente: {{$consulta->mascotas->clientes->nombre}}</h1>

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
        {!! Form::model($consulta, ['route' => ['admin.consultas.update', $consulta], 'method' => 'PUT']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('mascota', 'Nombre de la Mascota') !!}
                {!! Form::text('mascota', $consulta->mascotas->nombre, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechap', 'Fecha de la Consulta') !!}
                {!! Form::date('fecha', $consulta->fecha, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sintomas', 'Sintomas') !!}
                {!! Form::text('sintomas', $consulta->sintomas, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('diagnostico', 'Diagnostico') !!}
                {!! Form::text('diagnostico', $consulta->diagnostico, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    @stop
