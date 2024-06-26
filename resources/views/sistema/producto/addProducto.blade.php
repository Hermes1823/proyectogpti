@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Ingrese la informacion de productos</p>

    @if (session('message') == 'registro exitoso')
        <x-adminlte-alert class="bg-teal text-uppercase" icon="fa fa-lg fa-thumbs-up" title="Correcto" dismissable>
            Registro Exitoso
        </x-adminlte-alert>

        <script>
            // Redirigir a la vista categoria.index después de 2 segundos
            setTimeout(function() {
                window.location.href = "{{ route('marca.index') }}";
            }, 2000); // 2000 milisegundos = 2 segundos
        </script>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('producto.store') }}" method="POST">
                @csrf
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="descripcion" label="Nombre" placeholder="digite la descripcion"
                    label-class="text-lightblue" value="{{ old('descripcion') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- Categoria --}}

                <x-adminlte-select2 name="categoria" label="Categoria" label-class="text-lightblue" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                    @endforeach
                </x-adminlte-select2>


                {{-- marca --}}

                <x-adminlte-select2 name="marca" label="Marca" label-class="text-lightblue" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id_marca }}">{{ $marca->descripcion }}</option>
                    @endforeach
                </x-adminlte-select2>
                {{-- imagen --}}
                
                <x-adminlte-textarea name="imagen" label="imagen" rows=5 label-class="text-lightblue" igroup-size="sm"
                    placeholder="inserte imagen..." value="{{ old('imagen') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-lg fa-file-alt text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-textarea>

                {{-- precio_venta --}}

                <x-adminlte-input type="number" name="precio_venta" label="Precio de venta"
                    placeholder="Ingresa el precio de venta" label-class="text-lightblue" value="{{ old('precio_venta') }}"
                    step="0.01" min="0">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                {{-- precio_compra --}}

                <x-adminlte-input type="number" name="precio_compra" label="precio de compra"
                    placeholder="Ingresa el precio de compra" label-class="text-lightblue"
                    value="{{ old('precio_compra') }}" step="0.01" min="0">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-dollar-sign text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>



                {{-- cantidad --}}

                <x-adminlte-input name="cantidad" label="cantidad" placeholder="cantidad" type="number" igroup-size="sm"
                    min=1 max=10 label-class="text-lightblue">
                    <x-slot name="appendSlot">
                        <div class="input-group-text bg-dark">
                            <i class="fas fa-hashtag"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                {{-- medida --}}
                <x-adminlte-select2 name="medida" label="Unidad de Medida" label-class="text-lightblue" igroup-size="lg"
                    data-placeholder="Select an option...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-info">
                            <i class="fas fa-car-side"></i>
                        </div>
                    </x-slot>
                    @foreach ($unidades as $unidad)
                        <option value="{{ $unidad->id_medida }}">{{ $unidad->descripcion }}</option>
                    @endforeach
                </x-adminlte-select2>


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
