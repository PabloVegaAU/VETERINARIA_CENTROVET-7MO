@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>AÑADIR NUEVO PRODUCTOS</h1>

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
        {!! Form::open(['method' => 'POST', 'route' => 'admin.productos.store']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del producto') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombre']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::text('descripcion', null, ['class' => 'form-control','placeholder'=>'Descripción']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precio', 'Precio') !!}
                {!! Form::number('precio', null, ['class' => 'form-control','step'=>'any','placeholder'=>'Precio'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('cantidad', 'Cantidad') !!}
                {!! Form::number('cantidad', null, ['type'=>'email','class'=>'form-control','placeholder'=>'Cantidad'])
                !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("AÑADIR NUEVO PRODUCTO", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
