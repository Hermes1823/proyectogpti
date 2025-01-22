<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ReabesticimientoController extends Controller
{
   public function index(){
    $provedores= Proveedor::all();
    return view("sistema.producto.reabestecimiento.index",compact("provedores"));
   }


   public function store(Request $request){

   }

   public function show($id){

   }

   public function edit($id){}
   public function update(Request $request, $id){}
   public function destroy($id){}


   public function search_order_provee($id){

    $order_provee = OrdenCompra::all()
    ->where("ruc","=",$id)
    ->where("estado","LIKE","%PENDIENTE%");

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
    $orden_compra= OrdenCompra::find($id)->detalles();
    if($orden_compra){
        return response()->
        json(["data"=>$orden_compra,"success"=>true],200);
    }
    return response()->
    json(["data"=>null,"success"=>false],400);
   }
}
