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
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.querySelector('#sumacategoria').getContext('2d');
        const labels = {!! json_encode($resultados->pluck('categoria')) !!};
        const data = {!! json_encode($resultados->pluck('total')) !!};

        console.log(labels, data);

        const stackedBar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de productos por categoría',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: true
                    }
                }
            }
        });
    });
</script>
@stop
