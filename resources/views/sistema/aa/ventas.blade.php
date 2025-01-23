@extends('adminlte::page')

@section('title', 'Modelo de Venta')

@section('content_header')
    <h1>Modelo de Venta</h1>
@stop

@section('content')
    <p>Predecir</p>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('aa.sales') }}" method="post">
                @csrf
                <select name="input_data-7">
                    <option value="" disabled selected hidden>Tienda</option>
                    <option value="1">Tienda A</option>
                    <option value="2">Tienda B</option>
                    <option value="3">Tienda C</option>
                    <option value="4">Tienda D</option>
                </select>
                <input type="date" name="input_data-6" placeholder="Fecha">
                <select name="input_data-5">
                    <option value="" disabled selected hidden>Estación</option>
                    <option value="1">Verano</option>
                    <option value="2">Primavera</option>
                    <option value="3">Otoño</option>
                    <option value="4">Invierno</option>
                </select>
                <select name="input_data-4">
                    <option value="" disabled selected hidden>Tipo de día</option>
                    <option value="1">Laboral</option>
                    <option value="2">Festivo</option>
                    <option value="3">Descanso</option>
                </select>
                <select name="input_data-3">
                    <option value="" disabled selected hidden>Nivel de ventas presenciales</option>
                    <option value="1">Medio</option>
                    <option value="2">Bajo</option>
                    <option value="3">Alto</option>
                </select>
                <select name="input_data-2">
                    <option value="" disabled selected hidden>Distrito con más ventas</option>
                    <option name="1">El Porvenir</option>
                    <option name="2">Victor Larco Herrera</option>
                    <option name="3">Trujillo</option>
                    <option name="4">Laredo</option>
                    <option name="5">La Esperanza</option>
                    <option name="6">Huanchaco</option>
                    <option name="7">Florencia de Mora</option>
                </select>
                <input type="number" name="input_data-1" placeholder="Número de quejas">
                <input type="number" name="input_data" placeholder="Número de pedidos impuntuales"> <br> <br>
                <button class="primary" type="submit"><i class='fas fa-magic'></i> &nbsp Predecir</button>
            </form>
        </div>
        <div class="card-body">
            @if(!empty($prediction))
                <p>{{ $prediction }} pedidos</p>
            @endif
        </div>
    </div>
@stop

@section('css')
    <style>
        button {
            height: 40px;
            border: 0;
            border-radius: 20px;
            padding: 0px 24px;
            font-size: 14px;
            cursor: pointer
        }

        button.primary {
            background-color: #5b5b7e;
            color: white;
        }

        button.secondary {
            background-color: transparent;
            color:  #5b5b7e;
            border: 1px solid #5b5b7e;
        }

        input {
            margin-top: 16px;
            box-sizing: border-box;
            width: 100%;
            background-color: transparent;
            border: 1px solid #777477;
            border-radius: 4px;
            padding: 15px;
            font-size: 16px;
            color: #777477
        }

        input:focus {
            outline: none;
            border: 2px solid #5b5b7e;
            padding: 14px;
            color: #39383a
        }

        /* Select */

        select {
            margin-top: 16px;
            box-sizing: border-box;
            width: 100%;
            background-color: transparent;
            border: 1px solid #777477;
            border-radius: 4px;
            padding: 15px;
            font-size: 16px;
            color: #777477
        }

        select:focus {
            outline: none;
            border: 2px solid #5b5b7e;
            padding: 14px;
            color: #39383a
        }
    </style>
@stop

@section('js')

@stop