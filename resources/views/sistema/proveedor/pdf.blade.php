<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Proveedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px; /* Reducir el tamaño de la fuente general */
        }
        
        h1 {
            color: blue;
            font-size: 18px; /* Tamaño más pequeño para el título */
            margin-bottom: 10px; /* Separación inferior del título */
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px; /* Reducir el tamaño de la fuente de la tabla */
        }
        
        .table thead th {
            background-color: green;
            color: white;
            text-align: left;
            padding: 8px; /* Reducir el relleno de las celdas de encabezado */
            border-bottom: 1px solid #ddd;
        }
        
        .table tbody td {
            padding: 8px; /* Reducir el relleno de las celdas del cuerpo */
            border-bottom: 1px solid #ddd;
        }
        
        .empty-row td {
            text-align: center;
            font-weight: bold;
        }
        
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <h1>Listado de Proveedores</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">RUC</th>
                <th scope="col">RAZON SOCIAL</th>
                <th scope="col">DIRECCION</th>
                <th scope="col">ENCARGADO</th>
               
            </tr>
        </thead>
        <tbody>
            @if ($proveedores->isEmpty())
                <tr class="empty-row">
                    <td colspan="9">No hay registros</td> <!-- Ajustado el colspan al número de columnas -->
                </tr>
            @else
                @foreach ($proveedores as $proveedor)
                    <tr class="highlight">
                        <td>{{ $proveedor->ruc}}</td>
                        <td>{{ $proveedor->razon_social}}</td>
                        <td>{{ $proveedor->direccion}}</td>
                        <td>{{ $proveedor->encargado}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
