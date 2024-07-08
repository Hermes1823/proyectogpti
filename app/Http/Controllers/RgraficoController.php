<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use Illuminate\Http\Request;

class RgraficoController extends Controller
{
    public function index()
{
    $resultados = DB::table('producto')
        ->select('categoria.descripcion as categoria', DB::raw('SUM(producto.cantidad) as total'))
        ->join('categoria', 'producto.id_categoria', '=', 'categoria.id_categoria')
        ->groupBy('categoria.descripcion')
        ->get();

    return view('sistema.rgrafico', compact('resultados'));
}

}
