@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PROVEEDORES</h1>
@stop

@section('content')
    <p>Ingrese la informacion del proveedor</p>

    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Registro Exitoso
        </x-adminlte-alert>

        <script>
            // Redirigir a la vista categoria.index después de 2 segundos
            setTimeout(function(){
                window.location.href = "{{ route('proveedor.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('proveedor.store') }}" method="POST">
                @csrf
                {{-- RUC --}}
                <x-adminlte-input type="text" name="ruc" label="RUC" placeholder="digite el ruc de la empresa ..."
                    label-class="text-lightblue" value="{{ old('ruc') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                 {{-- razon_social --}}
                 <x-adminlte-input type="text" name="razon_social" label="Razon Social" placeholder="digite la descripcion"
                    label-class="text-lightblue" value="{{ old('razon_social') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>


                 {{-- direccion --}}
                 <x-adminlte-input type="text" name="direccion" label="Dirección" placeholder="digite la descripcion"
                    label-class="text-lightblue" value="{{ old('direccion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                 {{-- encargado --}}
                 <x-adminlte-input type="text" name="encargado" label="Encargado" placeholder="digite al encargado ..."
                    label-class="text-lightblue" value="{{ old('encargado') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
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

