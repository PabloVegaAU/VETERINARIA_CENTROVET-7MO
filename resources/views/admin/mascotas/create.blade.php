@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVA MASCOTA</h1>
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
        {!! Form::open(['method' => 'POST', 'route' => 'admin.mascotas.store']) !!}
        <div class="form-group">
            {!! Form::label('nombre', 'Nombres') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control','placeholder'=>'Nombre'])
            !!}
        </div>
        <div class="row">
            <div class="form-group col-sm">
                {!! Form::label('especie', 'Especie') !!}
                {!! Form::text('especie', null, ['class'=>'form-control','placeholder'=>'Especie del animal']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('raza', 'Raza') !!}
                {!! Form::text('raza', null, ['class'=>'form-control','placeholder'=>'Raza de la especie']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('sexo', 'Sexo') !!}
                {!! Form::select('sexo',array('m'=>'Macho','h'=>'Hembra'), null, ['class' =>
                'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('clientes', 'Cliente') !!}
            <table id="clientes" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres y apellidos</th>
                        <th>N° DNI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{!! Form::radio('clientes[]', $cliente->id, null, ['class' => 'mr-1']) !!}
                            {{$cliente->nombre}} {{$cliente->apellido}}
                        </td>
                        <td>
                            {{$cliente->dni}}
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
    </div>
</div>
@stop

@section('js')
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
