@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>MENÚ DE VACUNAS</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.vacunas.create') }}" class="btn btn-success">AÑADIR VACUNA</a>
        </div>
        <div class="card-body table-responsive">
            <table id="vacunas" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Mascota</th>
                        <th>Vacuna</th>
                        <th>Fecha Programada</th>
                        <th>Fecha Aplicada</th>
                        <th style="width:2px;text-align:center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacunas as $vacuna)
                    <tr>
                        <td>{{$vacuna->mascotas->nombre}}</td>
                        <td>{{$vacuna->vacuna}}</td>
                        <td>{{$vacuna->fechaprogramada}}</td>
                        <td>{{$vacuna->fechaaplicada}}</td>
                        <td style="display:flex ">
                            <a href="{{ route('admin.vacunas.edit', $vacuna) }}" class="btn btn-success">Editar</a>
                            <form action="{{ route('admin.vacunas.destroy', $vacuna->id) }}" method="post">
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

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
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
