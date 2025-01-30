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
                <input type="number" name="year" id="year" min="2016" max="2032" placeholder="Año" required>
                <select name="month" id="month">
                    <option value="" disabled selected hidden>Mes</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <input type="number" name="day" id="day" min="1" max="31" placeholder="Día" required>
                <select name="day_of_week" id="day_of_week">
                    <option value="" disabled selected hidden>Día de la semana</option>
                    <option value="0">Domingo</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miércoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sábado</option>
                </select> <br> <br>
                <button class="primary" type="submit"><i class='fas fa-magic'></i> &nbsp Predecir</button>
            </form>
        </div>
        <div class="card-body">
            @if(!empty($prediction))
                <p>{{ round($prediction / 64) }} pedidos</p>
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
            background-color: #415f91;
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