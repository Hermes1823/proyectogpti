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
                <select name="day_of_week" id="day_of_week" disabled>
                    <option value="" disabled selected hidden>Día de la semana</option>
                    <option value="0">Domingo</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miércoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sábado</option>
                </select>
                <br><br>
                <button class="primary" id="submit-btn" type="submit"><i class='fas fa-magic'></i> &nbsp Predecir</button>
                <span id="warning-msg" style="color: #ba1a1a; display: none;">&nbsp  &nbsp Día no laborable</span>
            </form>
        </div>
        <div class="card-body">
            @if(!empty($prediction))
                <p>{{ round($prediction / 64) }} pedidos</p>
            @endif
        </div>
    </div>

    <p>Gráfico</p>

    <div class="card">
        <div class="card-body">
            <canvas id="salesChart" width="400" height="200"></canvas>
            <button onclick="window.location.href='{{ route('aa.salesReport') }}'" class="primary">Descargar Reporte PDF</button>
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

        button.primary:disabled {
            background-color: #565f71;
            color: #ffffff;
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
    <script>
        const yearInput = document.getElementById('year')
        const monthSelect = document.getElementById('month')
        const dayInput = document.getElementById('day')
        const dayOfWeekSelect = document.getElementById('day_of_week')
        const submitBtn = document.getElementById('submit-btn')
        const warningMsg = document.getElementById('warning-msg')

        function updateDayOfWeek() {
            const year = yearInput.value
            const month = monthSelect.value - 1 // Mes en Date empieza de 0
            const day = dayInput.value
            
            if (year && month >= 0 && day) {
                const date = new Date(year, month, day)
                const dayOfWeek = date.getDay()
                
                dayOfWeekSelect.value = dayOfWeek
                dayOfWeekSelect.disabled = false

                if (dayOfWeek >= 1 && dayOfWeek <= 3) { // Lunes (1), Martes (2), Miércoles (3)
                    submitBtn.disabled = true
                    warningMsg.style.display = 'inline'
                } else {
                    submitBtn.disabled = false
                    warningMsg.style.display = 'none'
                }
            }
        }

        yearInput.addEventListener('input', updateDayOfWeek)
        monthSelect.addEventListener('change', updateDayOfWeek)
        dayInput.addEventListener('input', updateDayOfWeek)
    </script>

    <script>
        const predictions = @json($predictions ?? [])

        if (predictions.length === 0) {
            console.warn("No hay datos disponibles para mostrar en el gráfico.");
            document.getElementById('salesChart').style.display = 'none';
        } else {
            const labels = predictions.map(prediction => `${prediction.year}-${prediction.month}-${prediction.day}`);
            const data = predictions.map(prediction => prediction.prediction);

            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Predicciones de Ventas',
                        data: data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        tension: 0.4,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Fecha'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Predicción'
                            }
                        }
                    }
                }
            });
        }
    </script>
@stop