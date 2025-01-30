@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Grafico de venta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
          <div class="row my-2">
            <div class="col">
                <label for="">Año Inicio</label>
                <input type="number" id="anioInicio" class="form-control">

            </div>
            <div class="col">
                <label for="">Año Fin</label>
                <input type="number" id="anioFin" class="form-control">
            </div>
            <div class="col my-4">

                <button type="button" id="btn_filtrado" class="btn btn-primary"> <i class="fas fa-filter"></i>Filtrar</button>
            </div>
          </div>
            <x-adminlte-card title="Ventas por Año" theme="primary" icon="fas fa-chart-bar" removable collapsible>
                <canvas id="ventasChart" style=" width: 100%;"></canvas>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('js')

<script src="{{asset("js/reporte_venta.js")}}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdnjs.com/libraries/Chart.js"></script> --}}
    {{-- <script>
        resultados = @json($ventas);
        etiquetas = resultados.map((d) => d.año); //labels
        totales = resultados.map((c) => c.total);
        opciones={
            plugins:{
                legend:{
                    display:false
                },
                tooltip:{
                    enabled:false
                }
            }
        };
        // console.log(etiquetas);
        // console.log(cantidades);

        document.addEventListener('DOMContentLoaded', graficoBarras);

        function graficoBarras() {
            const grafico = document.getElementById('productos');
            caracteristicas = {
                type: 'line',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: "Ventas por año",
                        data: totales,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            new Chart(grafico, caracteristicas);
        }

    </script> --}}
@stop
