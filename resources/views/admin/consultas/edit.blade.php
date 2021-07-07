@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>EDITAR CONSULTA DE: {{$consulta->mascotas->clientes->nombre}}</h1>
<h1>MASCOTA: {{$consulta->mascotas->nombre}}</h1>
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
            <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('mascota', 'Mascota') !!}
                {!! Form::text('mascota', $consulta->mascotas->nombre, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('cliente', 'Dueño') !!}
                {!! Form::text('cliente', $consulta->mascotas->clientes->nombre." ".$consulta->mascotas->clientes->apellido, ['class' => 'form-control','disabled']) !!}
            </div>
        </div>
            <div class="form-group">
                {!! Form::label('fechap', 'Fecha de la Consulta') !!}
                {!! Form::date('fecha', $consulta->fecha, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sintomas', 'Sintomas') !!}
                {!! Form::textarea('sintomas', $consulta->sintomas, ['class' => 'form-control','rows'=>'3']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('diagnosticos', 'Diagnostico') !!}
                {!! Form::textarea('diagnosticos', $consulta->diagnosticos, ['class' => 'form-control','rows'=>'3']) !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
