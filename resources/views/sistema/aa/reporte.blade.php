<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Predicciones</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        .chart-container {
            width: 100%;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Reporte de Predicciones de Ventas</h1>

    <!-- Contenedor del gráfico -->
    <div class="chart-container">
        <canvas id="salesChart" width="400" height="200"></canvas>
    </div>

    <!-- Tabla de predicciones -->
    <h2>Tabla de Predicciones</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Cantidad de Demanda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($predictions->sortBy(fn($item) => "{$item->year}-{$item->month}-{$item->day}") as $prediction)
                <tr>
                    <td>{{ $prediction->year }}-{{ str_pad($prediction->month, 2, '0', STR_PAD_LEFT) }}-{{ str_pad($prediction->day, 2, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $prediction->prediction }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Script del gráfico -->
    <script>
        // Obtén las predicciones desde PHP
        const predictions = @json($predictions->sortBy(fn($item) => "{$item->year}-{$item->month}-{$item->day}")->values());

        // Extraer datos para el gráfico
        const labels = predictions.map(prediction => `${prediction.year}-${String(prediction.month).padStart(2, '0')}-${String(prediction.day).padStart(2, '0')}`);
        const data = predictions.map(prediction => prediction.prediction);

        // Configurar gráfico
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
                            text: 'Cantidad de Demanda'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
