@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>GESTION DE MARCAS</h1>
@stop

@section('content')
    <p>Ingrese la informacion de la marca</p>

 

    <div class="card">

        <div class="card-body">
            <form action="{{ route('marca.update', $marca) }}" method="POST">
                @csrf
                @method('PUT')  
                {{-- With prepend slot --}}
                <x-adminlte-input type="text" name="descripcion" label="descripcion" label-class="text-lightblue" value="{{$marca->descripcion}}">
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
                        window.location.href = "{{ route('marca.index') }}";
                    }
                })
            })
        
        </script>
    @endif

    
@stop