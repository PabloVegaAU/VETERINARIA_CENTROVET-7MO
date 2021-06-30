@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>EDITAR MASCOTA: {{$mascotas->nombre}}</h1>

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

        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', $mascotas->nombre, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('clientes', 'Dueño') !!}
                {!! Form::text('clientes', $mascotas->clientes->nombre, ['disabled','class' => 'form-control']) !!}
            </div>
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
        <div class="form-group">
            {!! Form::label('clientes', 'Clientes') !!}
            <table id="tclientes" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Seleccionar Dueño</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>
                            {!! Form::radio('clientes_id', $cliente->id, $mascotas->clientes, ['class' => 'mr-1'])
                            !!}
                            {{$cliente->nombre}} {{$cliente->apellido}}
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
</div>
@stop

@section('js')
<script>
    $('#tclientes').DataTable(
            {
                "responsive":true,
                "auto-with":false,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
</script>
@stop
