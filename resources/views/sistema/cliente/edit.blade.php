@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar el Cliente</h1>
@stop

@section('content')
    <p>Actualice datos del cliente</p>

    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Actualizacion Exitosa
        </x-adminlte-alert>

        <script>
            // Redirigir a la vista categoria.index después de 2 segundos
            setTimeout(function() {
                window.location.href = "{{ route('categoria.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('cliente.update', $cliente->DNI) }}" method="POST">
                @csrf
                @method("PUT")
                {{-- With prepend slot --}}
                <div class="row">
                    <div class="col">
                        <x-adminlte-input type="text" name="DNI" label="DNI" placeholder="{{ $cliente->DNI }}"
                            label-class="text-lightblue"  value="{{ old('DNI') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-audio-description text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>


                        <div class="col"><x-adminlte-input type="text" name="numero" label="N° Celular" placeholder="{{ $cliente->numero }}"
                            label-class="text-lightblue"  value="{{ old('numero') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-audio-description text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input></div>


                </div>
                <div class="row">
                    <div class="col">

                <x-adminlte-input type="text" name="nombre" label="Nombre" placeholder="{{ $cliente->nombre }}"
                    label-class="text-lightblue" value="{{ old('nombre') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                    </div>
                    <div class="col">

                        <x-adminlte-input type="text" name="apellidos" label="Apellidos" placeholder="{{ $cliente->apellidos }}"
                            label-class="text-lightblue" value="{{ old('apellidos') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fa fa-audio-description text-lightblue"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                </div>





                <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success"
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
