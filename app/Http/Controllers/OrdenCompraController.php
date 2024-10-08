<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\OrdenCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenesCompras= OrdenCompra::all();
        return view('sistema.ordencompra.index',compact('ordenesCompras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores=Proveedor::all();
        $productos= Producto::all();
        return view('sistema.ordencompra.addOrdenCompra', compact('proveedores','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  return $request;
        $validacion = $request->validate([
            'ruc' => 'required',
            'fecha' => 'required', 
            'direccion' => 'required',
            'total' => 'required',
            
        ]);

        $ordencompra = new OrdenCompra();

        $ordencompra->ruc = $request->input('ruc');
        $ordencompra->fecha = $request->input('fecha'); //este es un texarea 
        $ordencompra->direccion = $request->input('direccion'); //este es un texarea 
        $ordencompra->sub_total = 0;// este es un select 2 y agarra la variable desripcion de medida
        $ordencompra->total = $request->input('total');// este es un select 2 y agarra la variable desripcion de marca
        $ordencompra->save();

        // Guardar los detalles
        $id=$ordencompra->id_orden_compra;
        $cantidades=$request->cantidades;
        $precios=$request->precios;
        $productos=$request->productos;
        $detalle= null;
        $producto=null;
        for($i=0;$i<count($cantidades);$i++){
            //Agrega los detalles de compra
            $detalle= new DetalleCompra();
            $detalle->id_orden_compra=$id;
            $detalle->id_producto=$productos[$i];
            $detalle->cantidad=$cantidades[$i];
            $detalle->precio=$precios[$i];
            $detalle->save();
            //Aumenta existencia en almacen

            $producto= Producto::find($productos[$i]);
            $producto->cantidad=$producto->cantidad+$cantidades[$i];
            $producto->save();

        }

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('ordencompra.create');
        //return $producto;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordencompra= OrdenCompra::find($id);
        $pdf= Pdf::loadView('sistema.ordencompra.pdf',compact('ordencompra'));
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orden=OrdenCompra::find($id);
        $orden->delete();
        return back();
    }
}
