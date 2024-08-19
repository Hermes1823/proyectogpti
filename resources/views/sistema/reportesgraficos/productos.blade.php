@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Graficos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <x-adminlte-card title="Cantidad de productos en el inventario" theme="primary" icon="fas fa-chart-bar" removable collapsible>
                <canvas id="productos" style="height: 200px; width: 100%;"></canvas>
            </x-adminlte-card>
        </div>
        {{-- <div class="card-body">
            <x-adminlte-card title="Cantidad de productos por categoria" theme="primary" icon="fas fa-chart-bar" removable collapsible>
                <canvas id="sumacategoria" ></canvas>
            </x-adminlte-card>
        </div> --}}
    </div>
@stop

@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> --}}
    <script>
        resultados = @json($productos);
        etiquetas = resultados.map((d) => d.descripcion); //labels
        cantidades = resultados.map((c) => c.cantidad);
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
                type: 'bar',
                data: {
                    labels: etiquetas,
                    datasets: [{
                        label: "#Cantidad de productos",
                        data: cantidades,
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
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.querySelector('#sumacategoria').getContext('2d');
            const labels = {!! json_encode($resultados->pluck('categoria')) !!};
            const data = {!! json_encode($resultados->pluck('total')) !!};

            const totalSum = data.reduce((acc, value) => acc + value, 0);

            const backgroundColors = [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];

            const borderColors = [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ];

            const doughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de productos por categoría',
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        datalabels: {
                            formatter: (value, ctx) => {
                                const percentage = (value / totalSum * 100).toFixed(2) + '%';
                                return percentage;
                            },
                            color: '#fff',
                            backgroundColor: '#404040',
                            borderRadius: 3,
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
@stop
