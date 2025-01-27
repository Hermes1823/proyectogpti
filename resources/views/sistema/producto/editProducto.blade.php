@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Ingrese la informacion de productos</p>


    <div class="card">
        <div class="card-body">
            <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <x-adminlte-input type="text" name="descripcion" label="Nombre"
                            placeholder="digite la descripcion" label-class="text-lightblue"
                            value="{{ old('descripcion') }}">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-audio-description"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-select2 name="id_categoria" label="Categoria" label-class="text-lightblue"
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

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-select2 name="id_marca" label="Marca" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-car-side"></i>
                                </div>
                            </x-slot>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id_marca }}">{{ $marca->descripcion }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                    <div class="col">
                        {{-- IMAGEN --}}
                        <label for="" class="text-center">Imagen</label>
                        <img src="{{ asset('img/defaul_img.png') }}" class="img-thumbnail mx-auto d-block"
                            alt="{{ asset('img/defaul_img.png') }}" id="vs_img">
                        <input type="file" class="form-control-file" id="imagen" name="imagen">

                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-adminlte-input type="number" name="precio_venta" label="Precio de venta"
                            placeholder="Ingresa el precio de venta" label-class="text-lightblue"
                            value="{{ old('precio_venta') }}" step="0.01" min="0">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-input type="number" name="precio_compra" label="precio de compra"
                            placeholder="Ingresa el precio de compra" label-class="text-lightblue"
                            value="{{ old('precio_compra') }}" step="0.01" min="0">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <x-adminlte-input name="cantidad" label="cantidad" placeholder="cantidad" type="number" min=1
                            label-class="text-lightblue">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>
                    </div>
                    <div class="col">
                        <x-adminlte-select2 name="id_medida" label="Unidad de Medida" label-class="text-lightblue"
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
                    </div>
                </div>



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
    @if (session('message'))
        <script>
            $(document).ready(function() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //logica para que retorne a la vista categoria.index
                        window.location.href = "{{ route('producto.index') }}";
                    }
                })
            })
        </script>
    @endif
@stop
