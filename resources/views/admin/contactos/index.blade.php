@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE CONTACTOS </h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.contactos.create') }}" class="btn btn-success">AÑADIR CONTACTO</a>
        </div>
        <div class="card-body table-responsive">
            <table id="contactos" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombres y apellidos</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Comentario</th>
                        <th style="width:2px;text-align:center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{$contacto->nombre}} {{$contacto->apellido}}</td>
                        <td>{{$contacto->telefono}}</td>
                        <td>{{$contacto->email}}</td>
                        <td>{{$contacto->comentario}}</td>
                        <td style="display:flex ">
                            <a href="{{ route('admin.contactos.edit', $contacto) }}" class="btn
                            btn-success">Editar</a>
                            <form action="{{ route('admin.contactos.destroy', $contacto->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar" class="btn btn-danger"
                                    style="margin: 0px 0px 0px 5px;">
                            </form>
                        </td>
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
    $('#contactos').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
