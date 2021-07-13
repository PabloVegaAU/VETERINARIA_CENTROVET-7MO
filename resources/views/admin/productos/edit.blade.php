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
                {!! Form::textarea('descripcion', $producto->descripcion, ['class' =>
                'form-control','rows'=>'3','placeholder'=>'Descripción']) !!}
            </div>
            <div class="row">
                <div class="form-group col-sm">
                    {!! Form::label('precio', 'Precio') !!}
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">S/.</span>
                        {!! Form::number('precio', $producto->precio, ['class' =>
                        'form-control','step'=>'any','placeholder'=>'Precio'])
                        !!}
                    </div>
                </div>
                <div class="form-group col-sm">
                    {!! Form::label('cantidad', 'Cantidad') !!}
                    {!! Form::number('cantidad', $producto->cantidad,
                    ['type'=>'email','class'=>'form-control','placeholder'=>'Cantidad'])
                    !!}
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("ACTUALIZAR PRODUCTO", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
