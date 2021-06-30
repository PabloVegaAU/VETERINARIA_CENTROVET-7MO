@extends('adminlte::page')

@section('title', 'Centro Vet')

@section('content_header')
<h1>CREAR NUEVA CONSULTA</h1>

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
        {!! Form::open(['method' => 'POST', 'route' => 'admin.consultas.store']) !!}
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('fecha', 'Fecha') !!}
                {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sintomas', 'Sintomas') !!}
                {!! Form::textarea('sintomas', null, ['class' => 'form-control','rows'=>'3']]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('diagnosticos', 'Diagnostico') !!}
                {!! Form::textarea('diagnosticos', null, ['class' => 'form-control','rows'=>'3']) !!}
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

@section('js')
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
