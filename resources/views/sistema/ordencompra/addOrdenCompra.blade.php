@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE ORDEN DE COMPRA</h1>
@stop

@section('content')
    <p>Ingrese la informacion de orden de compra</p>

    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Registro Exitoso
        </x-adminlte-alert>

        <script>
            // Redirigir a la vista categoria.index después de 2 segundos
            setTimeout(function() {
                window.location.href = "{{ route('ordencompra.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card">
        <div class="card-body">



            <form action="{{ route('ordencompra.store') }}" method="POST">
                @csrf
                {{-- proveedor --}}
                <input type="hidden" name="detalles" id="detalles_venta">

                <div class="row">
                    <div class="col">
                        <x-adminlte-select name="ruc" label="Proveedor" label-class="text-lightblue"
                            data-placeholder="SeLeccione un proveedor" id="listaProveedores">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->ruc }}">{{ $proveedor->razon_social }}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="col">

                        <x-adminlte-input type="date" name="fecha" label="Fecha" placeholder="Selecciona la fecha"
                            label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>


                <div class="row">
                    <div class="col col-sm-12">
                        <x-adminlte-input name="direccion" type="text" label="Direccion"
                            placeholder="Ingrese la dirección ..." label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>

                </div>



                {{-- direccion --}}
                <div class="row">
                    <div class="col col-md-6  col-sm-6">
                        <x-adminlte-select label="Producto" name="producto" id="listaProductos"
                            data-placeholder="Seleccione un producto">
                            <option selected disabled>Seleccione un producto</option>
                            @foreach ($productos as $p)
                                <option value="{{ $p->id_producto }}" data-precio={{ $p->precio_compra }}>
                                    {{ $p->descripcion }}</option>
                            @endforeach
                            </x-adminlte-input>
                    </div>
                    <div class="col col-md-2 col-sm-6">
                        <label for="">Cantidad</label>
                        <input type="number" id="cantidad" class="form-control">
                    </div>
                    <div class="col col-md-2 col-sm-6">
                        <label for="">Precio</label>
                        <input type="number" id="precio" disabled="true" class="form-control">

                    </div>
                    <div class="col col-md-2 col-sm-6">
                        <label for="">Importe</label>
                        <input type="text" id="importe" disabled="true" class="form-control">

                    </div>
                </div>




                <div class="row gx-5 m-5">
                    <div class="col">
                        <x-adminlte-button class="btn-flat " type="submit" label="Guardar Orden de compra" theme="primary"
                            icon="fas fa-lg fa-save" id="btnAgregarOrden" />
                    </div>
                    <div class="col">
                        <x-adminlte-button class="btn-flat " type="submit" label="Agregar Producto" theme="success"
                            icon="fas fa-solid fa-plus" id="btnAgregarProducto" onclick="rellenarTabla()" />
                    </div>


                </div>
                <br>
                <div class="container-fluid">

                    <table class=" table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad </th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Importe</th>
                                <th scope="col">Borrar</th>

                            </tr>
                        </thead>
                        <tbody id="cuerpo_tabla"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-center">Total</td>
                                <td>

                                    <input type="hidden" class="form-control" name="total" id="txtTotal"
                                        aria-describedby="helpId" placeholder="" />

                                    <input type="number" class="form-control" id="txtTotal_" aria-describedby="helpId"
                                        placeholder="00.0" disabled=true />
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
    <script src="{{ asset('js/compra.js') }}"></script>
@stop
