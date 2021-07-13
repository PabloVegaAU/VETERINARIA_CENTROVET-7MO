@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>EDITAR RESERVA</h1>

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
        {!! Form::model($reservaciones, ['route' => ['admin.reservaciones.update', $reservaciones], 'method' => 'PUT'])
        !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha de la reserva') !!}
                {!! Form::date('fecha', $reservaciones->fecha, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('hora', 'Hora') !!}
                {!! Form::time('hora', $reservaciones->hora, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm">
                {!! Form::label('estado', 'Estado') !!}
                {!! Form::select('estado',array('0'=>'RESERVADO','1'=>'FINALIZADO','2'=>'NO ASISTIDO','3'=>'CANCELADO'),
                $reservaciones->estado, ['class' =>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('comentario', 'Comentario') !!}
                {!! Form::text('comentario', $reservaciones->comentario, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('clientes', 'Clientes') !!}
                <table id="tclientes" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombres y apellidos</th>
                            <th>DNI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td>
                                {!! Form::radio('clientes_id', $cliente->id, $reservaciones->clientes, ['class' =>
                                'mr-1'])
                                !!}
                                {{$cliente->nombre}} {{$cliente->apellido}}
                            </td>
                            <td>{{$cliente->dni}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                {!! Form::label('users_id', 'Veterinarios') !!}
                <table id="tusers" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombres y apellidos</th>
                            <th>DNI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                        @if ($user->tipo == "VETERINARIO")
                        <tr>
                            <td>
                                {!! Form::radio('users_id', $user->id, $reservaciones->users, ['class' => 'mr-1'])
                                !!}
                                {{$user->name}} {{$user->apellido}}
                            </td>
                            <td>{{$user->dni}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("EDITAR RESERVACIÓN", ['class' => 'btn btn-warning']) !!}
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
<script>
    $('#tusers').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
