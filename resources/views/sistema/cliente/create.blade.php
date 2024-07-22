@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Cliente</h1>
@stop

@section('content')
    <p>Ingrese la informacion del cliente</p>

    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Registro Exitoso
        </x-adminlte-alert>

        <script>
            // Redirigir a la vista categoria.index después de 2 segundos
            setTimeout(function(){
                window.location.href = "{{ route('categoria.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.store') }}" method="POST">
                @csrf
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="DNI" label="DNI" placeholder="Ingrese el N° DNI"
                    label-class="text-lightblue" value="{{ old('DNI') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="nombre" label="Nombre" placeholder="Ingrese su nombre"
                    label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input> 
                <x-adminlte-input type="text" name="apellidos" label="Apellidos" placeholder="Ingrese los apellidos"
                    label-class="text-lightblue" value="{{ old('apellidos') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                <x-adminlte-input type="text" name="numero" label="N° Celular" placeholder="Ingrese su número de celular"
                    label-class="text-lightblue" value="{{ old('numero') }}">
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

