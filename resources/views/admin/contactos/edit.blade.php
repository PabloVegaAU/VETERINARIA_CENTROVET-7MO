@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>EDITAR AL CONTACTO: {{$contacto->nombre ." ". $contacto->apellido}}</h1>

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
        {!! Form::model($contacto, ['route' => ['admin.contactos.update', $contacto], 'method' => 'PUT']) !!}

        <div class="form-group">
            <div class="row">
                <div class="form-group col-sm">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', $contacto->nombre, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('apellido', 'Apellido') !!}
                    {!! Form::text('apellido', $contacto->apellido, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group col-sm">
                {!! Form::label('telefono', 'N° de Telefono') !!}
                {!! Form::text('telefono', $contacto->telefono, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::text('email', $contacto->email, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('comentario', 'Comentario') !!}
                {!! Form::text('comentario', $contacto->comentario, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
