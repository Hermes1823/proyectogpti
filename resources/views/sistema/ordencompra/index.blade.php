@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado Ordenes Compras</h1>
@stop

@section('content')
    <p>Bienvenidos a la lista Ordenes Compras</p>



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
                    'Proveedor',
                    'Encargado',
                    'Fecha de emision',
                    'Direccion',
                    'Total',
                    ['label' => 'Actions', 'no-export' => true, 'width' => 10],
                ];



                $btnPDF = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
               

                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];

            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                @foreach ($ordenesCompras as $orden)
                    <tr>
                        <td>{{ $orden->id_orden_compra}}</td>
                        <td>{{ $orden->rproveedor->razon_social}}</td>
                        <td>{{ $orden->rproveedor->encargado}}</td>
                        <td>{{ $orden->fecha}}</td>
                        <td>{{ $orden->direccion}}</td>
                        <td>{{ $orden->total}}</td>


                        <td>
                            {{-- @can('ordencompra.edit')
                            <a href={{route('ordencompra.edit', $orden->id_orden_compra)}} class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            @endcan --}}
                            @can('ordencompra.destroy')
                            <form style="display: inline" action="{{ route('ordencompra.destroy', $orden->id_orden_compra) }}"
                                method="post" class="formEliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>
                            @endcan
                       
                            <a  class="btn btn-xs btn-default text-danger mx-1 shadow" target="_blank" href="{{ route('ordencompra.show',$orden->id_orden_compra) }}" type="button">
                                <i class="fas fa-file-pdf"></i>
                            </a>





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
                    text: "¡Se va a eliminar una orden de compra!",
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
