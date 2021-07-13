@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE PRODUCTOS</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
        <div class="card-header">
            <a href="{{ route('admin.productos.create') }}" class="btn btn-success">AÑADIR PRODUCTO</a>
        </div>
        @endif
        <div class="card">
            <div class="card-body table-responsive">
                <table id="tclientes" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th style="width:2px;text-align:center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>{{$producto->cantidad}}</td>
                            <td style="display:flex ">
                                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn
                                btn-success">Editar</a>
                                @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
                                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="post">
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
