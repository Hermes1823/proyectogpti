@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE PROVEEDORES</h1>
@stop

@section('content')
    <p>Ingrese la informacion del proveedor</p>

 

    <div class="card">

        <div class="card-body">
            <form action="{{ route('proveedor.update', $proveedor) }}" method="POST">
                @csrf
                @method('PUT')  
                {{-- RUC --}}
                <x-adminlte-input type="text" name="ruc" label="RUC" placeholder="digite el ruc de la empresa ..."
                    label-class="text-lightblue" value="{{$proveedor->ruc}}" readonly>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                 {{-- razon_social --}}
                 <x-adminlte-input type="text" name="razon_social" label="Razon Social" placeholder="digite la descripcion"
                    label-class="text-lightblue" value="{{$proveedor->razon_social}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>


                 {{-- direccion --}}
                 <x-adminlte-input type="text" name="direccion" label="Dirección" placeholder="digite la descripcion"
                    label-class="text-lightblue" value="{{$proveedor->direccion}}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fa fa-audio-description text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>

                 {{-- encargado --}}
                 <x-adminlte-input type="text" name="encargado" label="Encargado" placeholder="digite al encargado ..."
                    label-class="text-lightblue" value="{{$proveedor->encargado}}">
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
    

    @if (session("message"))
        <script>
            $(document).ready(function(){
                let mensaje="{{session('message')}}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //logica para que retorne a la vista categoria.index
                        window.location.href = "{{ route('proveedor.index') }}";
                    }
                })
            })
        
        </script>
    @endif

    
@stop