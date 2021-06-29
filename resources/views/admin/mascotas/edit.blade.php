@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Editar a {{$mascotas->nombre}}</h1>

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
        {!! Form::model($mascotas, ['route' => ['admin.mascotas.update', $mascotas], 'method' => 'PUT']) !!}

        <div class="form-group">

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', $mascotas->nombre, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('especie', 'Especie') !!}
                {!! Form::text('especie', $mascotas->especie, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('raza', 'Raza') !!}
                {!! Form::text('raza', $mascotas->raza, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sexo', 'Sexo') !!}
                {!! Form::select('sexo',array('m'=>'Macho','h'=>'Hembra'), $mascotas->sexo, ['class' =>
                'form-control']) !!}
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
