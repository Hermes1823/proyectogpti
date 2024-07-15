@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>LISTADO DE PRODUCTOS</h1>
@stop

@section('content')
    <p>Bienvenidos a la lista de prouctos</p>

    

    <div class="card">

        @can('prueba.pdf')
        <div class="card-body">
            <a href="{{ route('prueba.pdf') }}" class="btn btn-primary">Generar PDF</a>
            <!-- Resto del código existente para el contenido de la tabla de promociones -->
        </div>
        @endcan

        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = [
                    //nombres de las columas
                    'ID',
                    'Descripcion',
                    'imagen',
                    'Unidad',
                    'Marca',
                    'Precio de venta',
                    'Precio de compra',
                    'Cantidad',
                    'Categoria', 
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
                ];

                
                $btnEdit = '';
                $btnPDF = '';
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
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id_producto}}</td>
                        <td>{{ $producto->descripcion}}</td>
                        <td>{{ $producto->imagen}}</td>
                        <td>{{ $producto->unidadMedida->descripcion}}</td>
                        <td>{{ $producto->marca->descripcion}}</td>
                        <td>{{ $producto->precio_venta}}</td>
                        <td>{{ $producto->precio_compra}}</td>
                        <td>{{ $producto->cantidad}}</td>
                        <td>{{ $producto->categoria->descripcion}}</td>

                        
                        <td>
                            @can('producto.edit')
                            <a href={{route('producto.edit', $producto)}} class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>  
                            @endcan
                            @can('producto.destroy')
                            <form style="display: inline" action="{{ route('producto.destroy', $producto->id_producto) }}"
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
