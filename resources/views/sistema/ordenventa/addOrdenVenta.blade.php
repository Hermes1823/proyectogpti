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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('ordenventa.store') }}" method="POST">
                @csrf
                {{-- proveedor --}}
                <div class="row">
                    <div class="col">
                        <x-adminlte-select name="dni" label="Cliente" label-class="text-lightblue" igroup-size="lg"
                            data-placeholder="Select an option..." id="listaClientes">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->DNI }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="col">
                        <x-adminlte-input type="date" name="fecha" label="Fecha" placeholder="Selecciona la fecha"
                            label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>


                <div class="row">
                    <div class="col col-md-6 col-sm-12">
                        <x-adminlte-input name="direccion" type="text" label="Direccion"
                            placeholder="ingrese la direccion ..." label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-user text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>

                </div>



                {{-- direccion --}}
                <div class="row">
                    <div class="col col-md-4 col-sm-6">
                        <x-adminlte-select label="Producto" name="producto" id="listaProductos"
                            data-placeholder="Seleccione un producto">
                            @foreach ($productos as $p)
                                <option value="{{ $p->id_producto }}" data-precio={{ $p->precio_compra }}>
                                    {{ $p->descripcion }}</option>
                            @endforeach
                            </x-adminlte-input>
                    </div>
                    <div class="col col-md-4 col-sm-6">
                        <x-adminlte-input label="Cantidad" type="number" name="cantidad" id="cantidad">

                        </x-adminlte-input>
                    </div>
                    <div class="col col-md-4 col-sm-6">
                        <x-adminlte-input label="Precio" type="number" name="precio" id="precio" disabled=true>

                        </x-adminlte-input>
                    </div>
                    <div class="col col-md-4 col-sm-6">
                        <x-adminlte-input label="Importe" type="number" name="importe" id="importe" disabled=true>

                        </x-adminlte-input>
                    </div>
                </div>




                <div class="row">

                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar Orden Venta" theme="primary"
                        icon="fas fa-lg fa-save" id="brnAgregarOrden" />
                    <x-adminlte-button class="btn-flat" type="submit" label="Agregar Producto" theme="success"
                        icon="fas fa-solid fa-plus" id="btnAgregarProducto" onclick="rellenarTabla()" />
                </div>
                <br>
                <div class="container-fluid">

                    <table class=" table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nombre Producto</th>
                                <th scope="col">Cantidad </th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Importe</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo_tabla"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-center">Total</td>
                                <td >

                                    <input
                                        type="hidden"
                                        class="form-control"
                                        name="total"
                                        id="txtTotal"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />

                                    <input
                                    type="number"
                                    class="form-control"
                                    id="txtTotal_"
                                    aria-describedby="helpId"
                                    placeholder=""
                                    disabled=true
                                />
                                 </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{ asset('js/venta.js') }}"></script>
@stop
