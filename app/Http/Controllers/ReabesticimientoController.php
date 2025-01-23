<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\OrdenCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Test_reabesticimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReabesticimientoController extends Controller
{
   public function index(){
    $proveedores= Proveedor::all();
    return view("sistema.producto.reabestecimiento.index",compact("proveedores"));
   }


   public function store(Request $request){


    // return dd($request);
    $hora_inicio=Carbon::parse(  $request->hora_inicio);

    $id_compra=$request->get("ordenCompra");
    $ordenCompra= OrdenCompra::find($id_compra);
    $ordenCompra->estado="RECIBIDA";
    $ordenCompra->save();

    $detalles= DetalleCompra::where("id_orden_compra","=",$id_compra);
    foreach($detalles as $d){
        $producto= Producto::find($d->id_producto);
        $producto->cantidad=$producto->cantidad+$d->cantidad;
        $producto->save();
    }
    $hora_final= Carbon::now();
    $diferencia_tiempo=$hora_inicio->diff($hora_final)->format('%H:%I:%S');
    $diferencia_segundos= $hora_inicio->diffInSeconds($hora_final);
    $test_venta= new Test_reabesticimiento();
    $test_venta->fecha= Carbon::now()->format('d/m/Y');
    $test_venta->hora_inicio=$hora_inicio->format('H:i:s');
    $test_venta->hora_final=$hora_final->format('H:i:s');
    $test_venta->diferencia_tiempo=$diferencia_tiempo;
    $test_venta->diferencia_segundo=$diferencia_segundos;
    $test_venta->save();

    session()->flash('message', 'registro exitoso');

    return redirect()->route('reabesticimiento.index');
   }

   public function show($id){

   }

   public function edit($id){}
   public function update(Request $request, $id){}
   public function destroy($id){}


   public function search_order_provee($id){

    $order_provee = OrdenCompra::where("ruc","=",$id)
    ->where("estado","LIKE","PENDIENTE")
    ->get();

    if($order_provee){
        return response()
        ->json(
[
        "data"=>$order_provee,
        "success"=>true
        ],200);
    }
    return response()
    ->json(
[
    "data"=>null,
    "success"=>false
    ],400);

   }

   public function detalles_orden($id){
    $orden_compra= OrdenCompra::with("detalles.producto")->find($id);
    if($orden_compra){
        return response()
        ->json(["data"=>$orden_compra,"success"=>true],200);
    }
    return response()->
    json(["data"=>null,"success"=>false],400);
   }
}
