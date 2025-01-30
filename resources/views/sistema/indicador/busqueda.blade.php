@extends('adminlte::page')

@section('title', 'Indicador de Venta')

@section('content_header')
    <h1>Indicador de Busqueda Producto</h1>
@stop

@section('content')
    <p>Exportar</p>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('indicator.busqueda.export') }}" class="btn btn-success">
                <i class='fas fa-file-excel'></i> &nbsp Exportar a Excel
            </a>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
