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
                <x-adminlte-select2 name="ruc" label="Proveedor" label-class="text-lightblue" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->ruc }}">{{ $proveedor->razon_social }}</option>
                    @endforeach
                </x-adminlte-select2>

                {{-- fecha --}}

                <x-adminlte-input type="date" name="fecha" label="Fecha" placeholder="Selecciona la fecha"
                    label-class="text-lightblue" >
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-calendar text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- direccion --}}

                <x-adminlte-input name="direccion" label="Direccion" placeholder="ingrese la direccion ..." label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-user text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- sub total --}}

                <x-adminlte-input type="number" name="sub_total" label="Sub Total"
                    placeholder="Ingresa el precio de venta" label-class="text-lightblue" value="{{ old('sub_total') }}"
                    step="0.01" min="0">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- total --}}

                <x-adminlte-input type="number" name="total" label="Total"
                    placeholder="Ingresa el total ..." label-class="text-lightblue" value="{{ old('total') }}"
                    step="0.01" min="0">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                

                <x-adminlte-button class="btn-flat" type="submit" label="guardar" theme="primary"
                    icon="fas fa-lg fa-save" />
            </form>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- Additional JS code --}}
@stop
