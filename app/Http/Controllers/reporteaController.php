<?php

namespace App\Http\Controllers;

use App\Models\OrdenVenta;
use Illuminate\Http\Request;
use App\Models\Reportea;
use Illuminate\Support\Facades\DB;

class reporteaController extends Controller
{
    public function index(){
        $ventas= DB::select('select  year(fecha) as año, sum(total) as total from orden_venta
            group by año order by 1');
        // return $venta;
        // $navegadores=Reportea::all();

        // $puntos=[];
        // foreach($navegadores as $navegador){

        //     $puntos[]=['name' => $navegador['nombre'], 'y'=>floatval($navegador['porcentaje'])];
        // }
        return view('sistema.reportesgraficos.ventas', compact('ventas'));
    }
}
