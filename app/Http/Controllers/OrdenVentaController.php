<?php

namespace App\Http\Controllers;

use App\Models\Test_Orden_Venta;
use DB;
use Exception;
use Illuminate\Http\Request;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\OrdenVenta;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

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
            'detalles'=> 'required',
        ]);
        $hora_inicio=Carbon::parse(  $request->hora_inicio);


        try{
            DB::beginTransaction();
            $ordenventa = new OrdenVenta();
            $detalles= json_decode( $request->get('detalles'));
            $ordenventa->dni = $request->input('dni');
            $ordenventa->fecha = $request->input('fecha');
            $ordenventa->direccion = $request->input('direccion');
            $ordenventa->total = $request->input('total');
            $ordenventa->save();

            // Guardar los detalles
            $id=$ordenventa->id_orden_venta;
            $detalle= null;
            foreach($detalles as $linea){
                // Guarda detalle
                $detalle= new DetalleVenta();
                $detalle->id_orden_venta=$id;
                $detalle->id_producto=$linea->codigo_producto;
                $detalle->cantidad=$linea->cantidad;
                $detalle->precio=$linea->precio;
                $detalle->save();
                //Disminuye existencia en almacen

                $producto= Producto::find($linea->codigo_producto);
                $producto->cantidad=$producto->cantidad-$linea->cantidad;
                $producto->save();
                //
                $hora_final= Carbon::now();
            $diferencia_tiempo=$hora_inicio->diff($hora_final)->format('%H:%I:%S');
            $diferencia_segundos= $hora_inicio->diffInSeconds($hora_final);
            $test_venta= new Test_Orden_Venta();
            $test_venta->fecha= Carbon::now()->format('d/m/Y');
            $test_venta->hora_inicio=$hora_inicio->format('H:i:s');
            $test_venta->hora_final=$hora_final->format('H:i:s');
            $test_venta->diferencia_tiempo=$diferencia_tiempo;
            $test_venta->diferencia_segundo=$diferencia_segundos;
            $test_venta->save();
                //return back()->with('message','registro exitoso');
                DB::commit();
                session()->flash('message', 'registro exitoso');

                // Redirigir a la vista categoria.create
                return redirect()->route('ordenventa.create');
                //return $producto;
            }
        }catch(Exception $e){
            DB::rollback();
            session()->flash('message', "Ocurrio un error inesperado:  $e");

            return redirect()->route("ordenventa.create");
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ordenventa= OrdenVenta::find($id);
       $pdf=  Pdf::loadView('sistema.ordenventa.pdf',compact('ordenventa'));
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
        $orden=OrdenVenta::find($id);
        $orden->delete();
        return back();
    }
}
