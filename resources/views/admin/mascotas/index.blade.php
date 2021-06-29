@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Menu Mascotas</h1>
<a href="{{ route('admin.mascotas.create') }}" class="btn btn-success">Nueva Mascota </a>
@stop

@section('content')
<div class="card">
    <div class="card-body table-responsive">
        <table id="mascotas" class="table table-hover table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Sexo</th>
                    <th>Dueño</th>
                    <th style="width:2px;text-align:center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mascotas as $mascota)
                <tr>
                    <td>{{$mascota->nombre}}</td>
                    <td>{{$mascota->especie}}</td>
                    <td>{{$mascota->raza}}</td>
                    <td>
                        @if ($mascota->sexo == "m")
                        Macho
                        @else
                        Hembra
                        @endif
                    </td>
                    <td>
                        @if ($mascota->clientes != null)
                        {{$mascota->clientes->nombre}} {{$mascota->clientes->apellido}}
                        @else
                        Sin dueño
                        @endif
                    </td>
                    <td style="display:flex">
                        <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="btn btn-success col-sm">Editar</a>
                        <form action="{{ route('admin.mascotas.destroy', $mascota->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger col-sm"
                                style="margin: 0px 0px 0px 5px;">
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
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
