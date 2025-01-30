@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE ORDEN DE VENTA</h1>
@stop

@section('content')
    <p>Ingrese la informacion de orden de venta</p>

    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Registro Exitoso
        </x-adminlte-alert>

        <script>
            // Redirigir a la vista categoria.index después de 2 segundos
            setTimeout(function() {
                window.location.href = "{{ route('ordenventa.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card m-3">
        <div class="card-body">
            <form action="{{ route('ordenventa.store') }}" method="POST" id="formulario_venta">
                @csrf
                {{-- proveedor --}}
                <input type="hidden" name="detalles" id="detalles_venta">

                <input type="hidden" id="hora_inicio" name="hora_inicio">

                <span class="basic">Encabezado</span>

                <div class="row" style="margin-top: 16px">
                    <div class="col" >
                        <select name="dni" id="listaClientes">
                            <option value="" disabled selected hidden>Cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->DNI }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <input type="date" name="fecha" id="fecha" placeholder="Fecha" required>
                    </div>
                </div>

                <input type="text" name="direccion" id="direccion" placeholder="Dirección" required>

                <span class="basic">Producto</span>

                <div class="row" style="margin-top: 16px">
                    <div class="col-2">
                        <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" required>
                    </div>
                    <div class="col-6">
                        <select name="producto" id="listaProductos">
                            <option value="" disabled selected hidden>Producto</option>
                            @foreach ($productos as $p)
                                <option value="{{ $p->id_producto }}" data-precio={{ $p->precio_venta }}>{{ $p->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <input class="d" type="number" name="precio" id="precio" placeholder="Precio" disabled required>
                    </div>
                    <div class="col-2">
                        <input class="d" type="number" name="importe" id="importe" placeholder="Importe" disabled required>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; flex-direction: row">
                    <button class="secondary"  id="btnAgregarProducto" type="submit" onclick="rellenarTabla()"><i class='fas fa-plus'></i> &nbsp Agregar</button>
                </div>

                <br>
                <div class="container-fluid">

                    <table class="table" style="background: #f9f9ff; text-align: center" >
                        <thead style="background: #d6e3ff; color: #284777">
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad </th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Importe</th>
                                <th scope="col">Borrar</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo_tabla"></tbody>
                        <tfoot style="color: #284777">
                            <tr>
                                <td colspan="4" class="text-center">Total</td>
                                <td>

                                    <input type="hidden" class="form-control" name="total" id="txtTotal"
                                        aria-describedby="helpId" placeholder="" />

                                    <input type="number" class="form-control" id="txtTotal_" aria-describedby="helpId"
                                        placeholder="" disabled=true />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div style="display: flex; justify-content: flex-end; flex-direction: row">
                    <button class="primary" id="brnAgregarOrden" type="submit"><i class='fas fa-money-check'></i> &nbsp Guardar</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        span.basic {
            color: #415f91;
            padding-bottom: 16px;
        }

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
            color:  #415f91;
            border: 1px solid #415f91;
        }

        input {
            margin-bottom: 16px;
            box-sizing: border-box;
            width: 100%;
            background-color: transparent;
            border: 1px solid #777477;
            border-radius: 4px;
            padding: 15px;
            font-size: 16px;
            color: #777477
        }

        input.d {
            background: #e2e2e9
        }

        input:focus {
            outline: none;
            border: 2px solid #415f91;
            padding: 14px;
            color: #39383a
        }

        /* Select */

        select {
            margin-bottom: 16px;
            box-sizing: border-box;
            width: 100%;
            background-color: transparent;
            border: 1px solid #777477;
            border-radius: 4px;
            padding: 17px 15px;
            font-size: 16px;
            color: #777477
        }

        select:focus {
            outline: none;
            border: 2px solid #415f91;
            padding: 16px 14px;
            color: #39383a
        }
    </style>
@stop

@section('js')
<script>
    const  PRODUCTOS=@json($productos);
</script>
    <script src="{{ asset('js/venta.js') }}"></script>
@stop
