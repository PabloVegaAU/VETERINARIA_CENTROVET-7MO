@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVA MASCOTA </h1>
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

<div class="form-group">
    {!! Form::open(['method' => 'POST', 'route' => 'admin.mascotas.store']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Nombres') !!}
        {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre'])
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('especie', 'Especie') !!}
        {!! Form::text('especie', null, ['class'=>'form-control','placeholder'=>'Especie del animal']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('raza', 'Raza') !!}
        {!! Form::text('raza', null, ['class'=>'form-control','placeholder'=>'Raza de la especie']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sexo', 'Sexo') !!}
        {!! Form::select('sexo',array('m'=>'Macho','h'=>'Hembra'), null, ['class' =>
        'form-control']) !!}
    </div>
    <div class="form-group" align="center">
        {!! Form::submit("Añadir", ['class' => 'btn btn-warning']) !!}
    </div>
</div>
{!! Form::close() !!}
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#clientes').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
