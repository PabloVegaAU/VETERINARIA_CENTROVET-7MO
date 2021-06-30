@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>Crear nueva vacuna</h1>

@stop

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'admin.vacunas.store']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('vacuna', 'Nombre de la Vacuna') !!}
                {!! Form::text('vacuna', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechaprogramada', 'Fecha Programada') !!}
                {!! Form::date('fechaprogramada', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('fechaaplicada', 'Fecha Aplicada') !!}
                {!! Form::date('fechaaplicada', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('mascotas', 'Mascota') !!}
            <table id="tmascotas" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Seleccionar Mascota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mascotas as $mascota)
                    <tr>
                        <td>{!! Form::radio('mascotas[]', $mascota->id, null, ['class' => 'mr-1']) !!}
                            {{$mascota->nombre}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group" align="center">
            {!! Form::submit("Actualizar", ['class' => 'btn btn-warning']) !!}
        </div>
        {!! Form::close() !!}
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
    $('#tmascotas').DataTable(
        {
            "responsive":true,
            "auto-with":false,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
</script>
@stop
