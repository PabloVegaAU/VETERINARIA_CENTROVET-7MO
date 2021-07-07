@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>EDITAR AL PRODUCTO: {{$producto->nombre}}</h1>

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
        {!! Form::model($producto, ['route' => ['admin.productos.update', $producto], 'method' => 'PUT']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre del producto') !!}
                {!! Form::text('nombre', $producto->nombre, ['class' => 'form-control','placeholder'=>'Nombre']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::text('descripcion', $producto->descripcion, ['class' => 'form-control','placeholder'=>'Descripción']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('precio', 'Precio') !!}
                {!! Form::number('precio', $producto->precio, ['class' => 'form-control','step'=>'any','placeholder'=>'Precio'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('cantidad', 'Cantidad') !!}
                {!! Form::number('cantidad', $producto->cantidad, ['type'=>'email','class'=>'form-control','placeholder'=>'Cantidad'])
                !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("ACTUALIZAR PRODUCTO", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
