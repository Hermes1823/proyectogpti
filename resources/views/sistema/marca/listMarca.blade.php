@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>LISTADO DE MARCAS</h1>
@stop

@section('content')
    <p>Bienvenidos a la lista de marcas</p>

    <div class="card">

        <div class="card-body">
            <a href="{{ route('marca.pdf') }}" class="btn btn-primary">Generar PDF</a>
            <!-- Resto del código existente para el contenido de la tabla de promociones -->
        </div>

        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = [
                    //nombres de las columas
                    'ID',
                    'Descripcion',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
                ];

                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];

            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id_marca}}</td>
                        <td>{{ $marca->descripcion }}</td>
                        <td>
                            @can('marca.edit')
                            <a href={{route('marca.edit', $marca)}} class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>  
                            @endcan
                           
                            @can('marca.destroy')
                            <form style="display: inline" action="{{ route('marca.destroy', $marca->id_marca) }}"
                                method="post" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form> 
                            @endcan
                            

                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
 

    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();
                //a continuación se pega el código de la alerta 

                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "¡Se va a eliminar un registro!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            })
        })
    </script>
@stop
