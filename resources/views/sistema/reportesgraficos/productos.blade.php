@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Graficos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <x-adminlte-card title="Cantidad de productos en el inventario" theme="primary" icon="fas fa-chart-bar" removable collapsible>
                <div class="row d">
                    <label for="categoria">Filtrar por</label>
                    <select  class="form-control " id="categoria">
                        @foreach ($categorias as $c)
                        <option value="{{$c->id_categoria}}"> {{$c->descripcion}}</option>
                        @endforeach
                        <option value=""></option>
                    </select>
                </div>
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
       const  RESULTADOS = @json($productos);
        etiquetas = RESULTADOS.map((d) => d.descripcion); //labels
        cantidades = RESULTADOS.map((c) => c.cantidad);
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






    </script>
    <script src="{{asset('js/reporte_productos.js')}}"></script>

@stop
