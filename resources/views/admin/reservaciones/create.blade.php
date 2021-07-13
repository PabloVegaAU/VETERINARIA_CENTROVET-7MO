@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>AÑADIR NUEVA RESERVA</h1>

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
        {!! Form::open(['method' => 'POST', 'route' => 'admin.reservaciones.store']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha de la reserva') !!}
                {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('hora', 'Hora') !!}
                {!! Form::time('hora', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('comentario', 'Comentario') !!}
                {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
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
            <div class="form-group">
                {!! Form::label('usuarios', 'Veterinarios') !!}
                <table id="usuarios" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombres y apellidos</th>
                            <th>N° DNI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $user)
                        @if ($user->tipo == "VETERINARIO")
                        <tr>
                            <td>{!! Form::radio('usuarios[]', $user->id, null, ['class' => 'mr-1']) !!}
                                {{$user->name}} {{$user->apellido}}
                            </td>
                            <td>
                                {{$user->dni}}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("AÑADIR NUEVA RESERVACIÓN", ['class' => 'btn btn-warning']) !!}
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
<script>
    $('#usuarios').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
