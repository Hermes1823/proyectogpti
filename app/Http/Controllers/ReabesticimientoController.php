<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\OrdenCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ReabesticimientoController extends Controller
{
   public function index(){
    $proveedores= Proveedor::all();
    return view("sistema.producto.reabestecimiento.index",compact("proveedores"));
   }


   public function store(Request $request){


    // return dd($request);
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
