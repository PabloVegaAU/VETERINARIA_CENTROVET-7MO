@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE MASCOTAS</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
        <div class="card-header">
            <a href="{{ route('admin.mascotas.create') }}" class="btn btn-success">AÑADIR MASCOTA</a>
        </div>
        @endif
        <div class="card-body table-responsive">
            <table id="mascotas" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Sexo</th>
                        <th>Dueño</th>
                        @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
                        <th style="width:2px;text-align:center">Acciones</th>
                        @endif
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
                        @if ( Auth::user()->tipo == "ADMIN" || Auth::user()->tipo == "RECEPCIONISTA")
                        <td style="display:flex">

                            <a href="{{ route('admin.mascotas.edit', $mascota) }}"
                                class="btn btn-success col-sm">Editar</a>

                            @if ( Auth::user()->tipo == "ADMIN")
                            <form action="{{ route('admin.mascotas.destroy', $mascota->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger col-sm"
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
@stop

@section('js')
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
