<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\OrdenVenta;

class OrdenVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ordenesVentas= OrdenVenta::all();

        return view('sistema.ordenventa.index',compact('ordenesVentas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes=Cliente::all();
        $productos= Producto::all();
        return view('sistema.ordenventa.addOrdenVenta', compact('clientes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //  return $request;
         $validacion = $request->validate([
            'dni' => 'required',
            'fecha' => 'required',
            'direccion' => 'required',
            'total' => 'required',

        ]);

        $ordenventa = new OrdenVenta();

        $ordenventa->dni = $request->input('dni');
        $ordenventa->fecha = $request->input('fecha');
        $ordenventa->direccion = $request->input('direccion');
        $ordenventa->total = $request->input('total');
        $ordenventa->save();

        // Guardar los detalles
        $id=$ordenventa->id_orden_venta;
        $cantidades=$request->cantidades;
        $precios=$request->precios;
        $productos=$request->productos;
        $detalle= null;
        $producto = null;
        for($i=0;$i<count($cantidades);$i++){
            // Guarda detalle
            $detalle= new DetalleVenta();
            $detalle->id_orden_venta=$id;
            $detalle->id_producto=$productos[$i];
            $detalle->cantidad=$cantidades[$i];
            $detalle->precio=$precios[$i];
            $detalle->save();
            //Disminuye existencia en almacen

            $producto= Producto::find($productos[$i]);
            $producto->cantidad=$producto->cantidad-$cantidades[$i];
            $producto->save();

        }

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('ordenventa.create');
        //return $producto;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $orden=OrdenVenta::find($id);
        $orden->delete();
        return back();
    }
}
