@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Menu de Clientes </h1>
<a href="{{ route('admin.users.create') }}" class="btn btn-success">Nuevo Cliente </a>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="usuarios" class="table table-striped table-bordered" style="width:100%">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Celular</th>
                    <th>Domicilio</th>
                    {{-- <th style="width:2px;text-align:center">Acciones</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente as $clientes)
                <tr>
                    <td>{{$clientes->id}}</td>
                    <td>{{$clientes->nombre}}</td>
                    <td>{{$clientes->apellido}}</td>
                    <td>{{$clientes->dni}}</td>
                    <td>{{$clientes->celular}}</td>
                    <td>{{$clientes->domicilio}}</td>
                    {{-- <td style="display:flex ">

                        <a href="{{ route('admin.users.edit', $clientes) }}" class="btn btn-success">Editar</a>
                        <form action="{{ route('admin.users.destroy', $clientes->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger"
                                style="margin: 0px 0px 0px 5px;">
                        </form>


                    </td> --}}
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
<script>
    console.log('Hola!');
</script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
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