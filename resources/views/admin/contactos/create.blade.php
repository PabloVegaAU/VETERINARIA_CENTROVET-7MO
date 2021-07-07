@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>AÑADIR NUEVO CONTACTO</h1>

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
        {!! Form::open(['method' => 'POST', 'route' => 'admin.contactos.store']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombres') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control','placeholder'=>'Nombres']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apellido', 'Apellidos') !!}
                {!! Form::text('apellido', null, ['class' => 'form-control','placeholder'=>'Apellidos']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control','placeholder'=>'N° Telefonico']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::text('email', null, ['type'=>'email','class'=>'form-control','placeholder'=>'Correo Electronico'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('comentario', 'Comentario') !!}
                {!! Form::textarea('comentario', null, ['class' => 'form-control','placeholder'=>'Comentario']) !!}
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("Crear", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')
<script>
    $('#tmascotas').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
