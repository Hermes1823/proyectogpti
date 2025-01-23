@extends('adminlte::page')

@section('title', 'Reabesticimiento')

@section('content_header')
    Reabastecimiento
@stop

@section('content')


    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Registro Exitoso
        </x-adminlte-alert>

        <script>
            setTimeout(function() {
                window.location.href = "{{ route('producto.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card m-3">
        <div class="card-body">

         <form action="{{route('reabesticimiento.store')}}" method="post" id="formulario">
            @csrf
            <input type="hidden" name="hora_inicio" id="hora_inicio">
            <input type="hidden" name="estado" id="estado">
            <div class="row">
                <div class="col col-md-6 col-sm-12">
                    <x-adminlte-select name="proveedor" label="Proveedores" label-class="text-lightblue"
                        data-placeholder="Seleccione un proveedor" id="listaProveedores">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                        <option selected>Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->ruc }}">{{ $proveedor->razon_social }}</option>
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="col col-md-6 col-sm-12">
                    <x-adminlte-select name="ordenCompra" label="Ordenes Compra" label-class="text-lightblue"
                        data-placeholder="Seleccione una orden de compra" id="listaOrdenes">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-user"></i>
                            </div>
                        </x-slot>
                        <option selected>Sin Ordenes de compra</option>

                    </x-adminlte-select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-success" type="button" id="btn_aprobar">Aprobar</button>
                </div>

                <div class="col">
                    <button class="btn btn-danger" type="button" id="btn_rechazar">Rechazar</button>
                </div>

            </div>
         </form>


            <br>
            <div class="container-fluid">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad </th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Importe</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo_tabla"></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-center">Total</td>
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

            </form>
        </div>



    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

    <script src="{{ asset('js/reabesticimiento.js') }}"></script>
@stop
