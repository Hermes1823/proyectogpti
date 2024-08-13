<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupRestController extends Controller
{
    public function totalProductosPorCategoria(): JsonResponse {
        $totalesPorCategoria = DB::table('producto')
            ->join('categoria', 'producto.id_categoria', '=', 'categoria.id_categoria')
            ->select('categoria.descripcion as categoria', DB::raw('COUNT(producto.id_producto) as total_productos'))
            ->groupBy('categoria.descripcion')
            ->get();

        return response()->json($totalesPorCategoria, 200);
    }
}