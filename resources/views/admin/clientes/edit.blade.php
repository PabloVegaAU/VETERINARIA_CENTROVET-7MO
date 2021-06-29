@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Editar a {{$clientes->nombre}}</h1>

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
        {!! Form::model($clientes, ['route' => ['admin.clientes.update', $clientes], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', $clientes->nombre, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('apellido', 'Apellidos') !!}
                {!! Form::text('apellido', $clientes->apellido, ['class' => 'form-control','disabled']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('dni', 'DNI') !!}
                {!! Form::text('dni', $clientes->dni, ['class' => 'form-control','disabled']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::text('email', $clientes->email, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('celular', 'N° de Celular') !!}
                {!! Form::text('celular', $clientes->celular, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
                {!! Form::date('fecha_nac', $clientes->fecha_nac, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('edad', 'Edad') !!}
                {!! Form::text('edad', $clientes->edad, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('sexo', 'Sexo') !!}
                {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), $clientes->sexo, ['class' =>
                'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('domicilio', 'Domicilio') !!}
            {!! Form::text('domicilio', $clientes->domicilio, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mascotas', 'Mascotas') !!}
            <table id="mascotas" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Seleccionar Mascota</th>
                        <th>Especie</th>
                        <th>Raza</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                    <tr>
                        <td>
                            {!! Form::checkbox('mascotas[]', $mascota->id, $clientes->mascotas, ['class' => 'mr-1'])
                            !!}
                            {{$mascota->nombre}}
                        </td>
                        <td>
                            {{$mascota->especie}}
                        </td>
                        <td>
                            {{$mascota->raza}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#mascotas').DataTable(
            {
                "responsive":true,
                "auto-with":false,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
    </script>
    @stop
