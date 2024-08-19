@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Graficos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <x-adminlte-card title="Productos por Categoría" theme="primary" icon="fas fa-chart-bar" removable collapsible>
                <canvas id="sumacategoria" style="height: 400px; width: 100%;"></canvas>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.querySelector('#sumacategoria').getContext('2d');
            const labels = {!! json_encode($resultados->pluck('categoria')) !!};
            const data = {!! json_encode($resultados->pluck('total')) !!};

            console.log(labels, data);

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
                        }
                    }
                }
            });
        });
    </script>
@stop
