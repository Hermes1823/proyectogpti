<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden Venta</title>
    <style>
                <?php include(public_path().'/vendor/adminlte/dist/css/adminlte.min.css');?>
                <?php include(public_path().'/vendor/adminlte/dist/css/adminlte.css');?>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #6777EF;
            color: #fff;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            background-color: #6777EF;
            color: #fff;
            padding: 10px;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row-fluid">

            <div class="col-5" style="display: inline-block;width:300px; left:0;">
                <strong>Cliente:{{ $ordenventa->cliente->nombre }}</strong> <br>
                <strong>DNI:{{ $ordenventa->cliente->DNI }} </strong> <br>
                <label class="m-0 p-0"></label> <br>
                <label class="m-0 p-0"> Numero:{{ $ordenventa->cliente->numero }} </label> <br>
                <label class="m-0 p-0"> Direccion:{{ $ordenventa->direccion }} </label> <br>

            </div>
            <div class="col-5 text-center" style="display: inline-block;width:200px;height:80px;left:10px; bottom:60px; border: 2px solid #6777EF;font-size:25px">
               <label for="" class="text-center">Orden Venta</label> <br>
                <strong class="text-center"> N°{{ $ordenventa->id_orden_venta }} </strong>
            </div>
        </div>
        <div class="row-fluid">

            <div class="col" style="display: inline-block;width:220px; left:300px;bottom:50px">
                <strong>Fecha: {{ $ordenventa->fecha }}</strong >
            </div>
        </div>
        <div class="detalle-container">
            <h4>Detalles Orden de Venta</h4>
            <table>
                <thead>

                    <tr>
                        <th style="width: 30px" >CANT.</th>
                        <th style="width: 30px" >UNIDAD.</th>
                        <th>DESCRIPCION</th>
                        <th>MARCA</th>
                        <th>CATEGORIA</th>

                        <th style="width: 50px" >P.UNIT</th>
                        <th style="width: 70px" >TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($ordenventa->detalles as $d)
                      <tr>

                        <td>{{ $d->cantidad }}</td>
                        <td>{{ $d->producto->unidadMedida?->descripcion ?? "Sin unidad de medida"}}</td>
                        <td>{{$d->producto?->descripcion?? "Sin descripcion"   }}</td>
                        <td>{{ $d->producto->marca?->descripcion ?? "Sin marca"  }}</td>
                        <td>{{ $d->producto->categoria?->descripcion ?? "Sin categoria" }}</td>
                        <td>{{ $d->precio }}</td>
                        <td>{{ $d->precio* $d->cantidad }}</td>
                      </tr>
                  @endforeach
                </tbody>
                <tfoot style="font-weight:100">


                    <tr>
                        <td colspan="6"  style="width: 50px; text-align:right;border:0;margin:0;padding:0px">Total</td>
                        <td style="border:0">{{ $ordenventa->total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="footer">
            <footer> Comercial Anderson</footer>
        </div>
    </div>

</body>
</html>
