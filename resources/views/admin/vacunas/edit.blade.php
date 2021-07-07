@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Editar a {{$vacunas->vacuna}}</h1>

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
        {!! Form::model($vacunas, ['route' => ['admin.vacunas.update', $vacunas], 'method' => 'PUT']) !!}

        <div class="form-group">
            <div class="row">
                <div class="form-group col-sm">
                    {!! Form::label('mascota', 'Mascota') !!}
                    {!! Form::text('mascota', $vacunas->mascotas->nombre, ['class' => 'form-control','disabled']) !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('cliente', 'Dueño') !!}
                    {!! Form::text('cliente', $vacunas->mascotas->clientes->nombre."
                    ".$vacunas->mascotas->clientes->apellido, ['class' => 'form-control','disabled']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('vacuna', 'Nombre de la Vacuna') !!}
                {!! Form::text('vacuna', $vacunas->vacuna, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechaprogramada', 'Fecha Programada') !!}
                {!! Form::date('fechaprogramada', $vacunas->fechaprogramada, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechaaplicada', 'Fecha Aplicada') !!}
                {!! Form::date('fechaaplicada', $vacunas->fechaaplicada, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
