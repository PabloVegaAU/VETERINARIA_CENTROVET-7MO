@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVO CLIENTE </h1>
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
{!! Form::open(['method' => 'POST', 'route' => 'admin.clientes.store']) !!}
<div class="row">
    <div class="form-group col-sm">
        {!! Form::label('nombre', 'Nombres') !!}
        {!! Form::text('nombre', null, ['id'=>'nombre', 'name'=>'nombre','class'=>
        'form-control','placeholder'=>'Nombres'])
        !!}
    </div>
    <div class="form-group col-sm">
        {!! Form::label('apellido', 'Apellidos') !!}
        {!! Form::text('apellido', null, ['id'=>'apellido', 'name'=>'apellido','class'=>
        'form-control','placeholder'=>'Apellidos']) !!}
    </div>
    <div class="form-group col-sm">
        {!! Form::label('dni', 'N° DNI') !!}
        <div style="display: flex">
            {!! Form::text('dni', null, ['id'=>'dni', 'name'=>'dni','class'=>
            'form-control','placeholder'=>'N° de DNI']) !!}
            <input type="button" class="btn btn-warning" onclick="consultar()" value="Validar">
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-sm">
        {!! Form::label('email', 'Correo Electronico') !!}
        {!! Form::text('email', null, ['type'=>'email','class'=>'form-control','placeholder'=>'Correo Electronico'])
        !!}
    </div>
    <div class="form-group col-sm">
        {!! Form::label('celular', 'N° Celular') !!}
        {!! Form::text('celular', null, ['class'=>'form-control','placeholder'=>'N° Telefonico']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm">
        {!! Form::label('fecha_nac', 'Fecha de nacimiento') !!}
        {!! Form::date('fecha_nac', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-sm">
        {!! Form::label('edad', 'Edad') !!}
        {!! Form::text('edad', null, ['class'=>'form-control','placeholder'=>'Edad']) !!}
    </div>
    <div class="form-group col-sm">
        {!! Form::label('sexo', 'Sexo') !!}
        {!! Form::select('sexo',array('m'=>'Masculino','f'=>'Femenino'), null, ['class' =>
        'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('domicilio', 'Domicilio') !!}
    {!! Form::text('domicilio', null, ['class'=>'form-control','placeholder'=>'Domicilio']) !!}
</div>
<div class="form-group">
    {!! Form::label('mascotas', 'Mascotas') !!}
    <table id="mascotas" class="table table-hover table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Seleccionar Mascota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascotas as $mascota)
            <tr>
                <td>{!! Form::checkbox('mascotas[]', $mascota->id, null, ['class' => 'mr-1']) !!}
                    {{$mascota->nombre}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="form-group" align="center">
    {!! Form::submit("Añadir", ['class' => 'btn btn-warning']) !!}
</div>

{!! Form::close() !!}
@stop

@section('js')
<script src="{{ asset('vendor/js/api_dni,js')}}"></script>
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
