@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE CLIENTES</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
        <div class="card-header">
            <a href="{{ route('admin.clientes.create') }}" class="btn btn-success">AÑADIR CLIENTE</a>
        </div>
        @endif
        <div class="card">
            <div class="card-body table-responsive">
                <table id="tclientes" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>DNI</th>
                            <th>Correo Electronico</th>
                            <th>Celular</th>
                            <th>Domicilio</th>
                            <th>Mascotas</th>
                            @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
                            <th style="width:2px;text-align:center">Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente as $clientes)
                        <tr>
                            <td>{{$clientes->nombre}} {{$clientes->apellido}}</td>
                            <td>{{$clientes->dni}}</td>
                            <td>{{$clientes->email}}</td>
                            <td>{{$clientes->celular}}</td>
                            <td>{{$clientes->domicilio}}</td>
                            <td>
                                @foreach ($clientes->mascotas as $mascotas)
                                <strong>*</strong> {{$mascotas->nombre}}<br>
                                @endforeach
                            </td>
                            @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
                            <td align="center">
                                <a href="{{ route('admin.clientes.edit', $clientes) }}"
                                    class="btn btn-success">Editar</a>

                                @if ( Auth::user()->tipo == "ADMIN")
                                <form action="{{ route('admin.clientes.destroy', $clientes->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger"
                                        style="margin: 0px 0px 0px 5px;">
                                </form>
                                @endif
                            </td>
                            @endif
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
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
