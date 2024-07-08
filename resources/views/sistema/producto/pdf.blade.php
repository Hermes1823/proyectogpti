<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
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
    <h1>Listado de Productos</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripción</th>
                <th scope="col">Imagen</th>
                <th scope="col">Unidad</th>
                <th scope="col">Marca</th>
                <th scope="col">Precio de venta</th>
                <th scope="col">Precio de compra</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Categoría</th> <!-- Corregido a "Categoría" -->
            </tr>
        </thead>
        <tbody>
            @if ($productos->isEmpty())
                <tr class="empty-row">
                    <td colspan="9">No hay registros</td> <!-- Ajustado el colspan al número de columnas -->
                </tr>
            @else
                @foreach ($productos as $producto)
                    <tr class="highlight">
                        <td>{{ $producto->id_producto}}</td>
                        <td>{{ $producto->descripcion}}</td>
                        <td>{{ $producto->imagen}}</td>
                        <td>{{ $producto->unidadMedida->descripcion}}</td>
                        <td>{{ $producto->marca->descripcion}}</td>
                        <td>{{ $producto->precio_venta}}</td>
                        <td>{{ $producto->precio_compra}}</td>
                        <td>{{ $producto->cantidad}}</td>
                        <td>{{ $producto->categoria->descripcion}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
