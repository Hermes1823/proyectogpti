@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Gráfico de ventas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row my-2">
                <div class="col">
                    <label for="">Año Inicio</label>
                    <input type="number" id="anioInicio" class="form-control" min="0">
                </div>
                <div class="col">
                    <label for="">Año Fin</label>
                    <input type="number" id="anioFin" class="form-control" min="0">
                </div>
                <div class="col my-4">
                    <button type="button" id="btn_filtrado" class="btn btn-primary">
                        <i class="fas fa-filter"></i> Filtrar
                    </button>
                </div>
            </div>
            <div id="mensajeError" class="alert alert-danger" style="display: none;"></div>
            <x-adminlte-card title="Ventas por Año" theme="primary" icon="fas fa-chart-bar" removable collapsible>
                <canvas id="ventasChart" style="width: 100%; height: 400px;"></canvas>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset('js/reporte_venta.js') }}"></script>
@stop
