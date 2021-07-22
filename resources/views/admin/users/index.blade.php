@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE USUARIOS</h1>
@stop

@section('content')
<div class="card">
    @if ( Auth::user()->tipo == "ADMIN")
    <div class="card-header">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">AÑADIR USUARIO</a>
    </div>
    @endif
    <div class="card-body table-responsive">
        <table id="tusuarios" class="table table-hover table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    @if ( Auth::user()->tipo == "ADMIN")
                    <th style="width:2px;text-align:center">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->apellido}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tipo}}</td>

                    @if ( Auth::user()->tipo == "ADMIN")
                    <td style="display:flex ">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-success">Editar</a>
                        @if ($user->id != Auth::user()->id)
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
@stop

@section('js')
<script>
    $('#tusuarios').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
