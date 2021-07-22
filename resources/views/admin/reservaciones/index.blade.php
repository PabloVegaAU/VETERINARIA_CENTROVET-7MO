@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE RESERVACIONES</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.reservaciones.create') }}" class="btn btn-success">AÑADIR RESERVACIÓN</a>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <table id="tclientes" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Estado</th>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Veterinario</th>
                            <th>Comentario</th>
                            <th style="width:2px;text-align:center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservaciones as $reservacion)
                        <tr>
                            <td>{{$reservacion->fecha}}<br> {{$reservacion->hora}}</td>
                            <td>@switch($reservacion->estado)
                                @case(0)
                                RESERVADO
                                @break
                                @case(1)
                                FINALIZADO
                                @break
                                @case(2)
                                NO ASISTIDO
                                @break
                                @case(3)
                                CANCELADO
                                @break
                                @endswitch</td>
                            <td>{{$reservacion->clientes->nombre}}<br>{{$reservacion->clientes->apellido}}</td>
                            <td>{{$reservacion->clientes->email}}<br>{{$reservacion->clientes->celular}}</td>
                            <td>{{$reservacion->users->name}}<br>{{$reservacion->users->apellido}}</td>
                            <td>{{$reservacion->comentario}}</td>
                            <td style="display:flex ">
                                <a href="{{ route('admin.reservaciones.edit', $reservacion) }}" class="btn
                                btn-success">Editar</a>
                                @if ( Auth::user()->tipo == "ADMIN")
                                <form action="{{ route('admin.reservaciones.destroy', $reservacion->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger"
                                        style="margin: 0px 0px 0px 5px;">
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')

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
