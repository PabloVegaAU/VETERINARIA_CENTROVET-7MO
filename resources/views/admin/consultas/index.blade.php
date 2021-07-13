@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE CONSULTAS</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.consultas.create') }}" class="btn btn-success">AÑADIR CONSULTA</a>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <table id="vacunas" class="table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mascota</th>
                            <th>Fecha</th>
                            <th>Sintomas</th>
                            <th>Diagnosticos</th>
                            <th style="width:2px;text-align:center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                        <tr>
                            <td>{{$consulta->mascotas->nombre}}</td>
                            <td>{{$consulta->fecha}}</td>
                            <td>{{$consulta->sintomas}}</td>
                            <td>{{$consulta->diagnosticos}}</td>
                            <td style="display:flex ">
                                <a href="{{ route('admin.consultas.edit', $consulta) }}"
                                    class="btn btn-success">Editar</a>
                                @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
                                <form action="{{ route('admin.consultas.destroy', $consulta->id) }}" method="post">
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

@section('js')
<script>
    $('#vacunas').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
