<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use Illuminate\Http\Request;

class RgraficoController extends Controller
{
    public function index()
{

    $productos=Producto::all(['descripcion','cantidad',"id_categoria"]);
    $categorias= Categoria::all("*");

    // return $categorias;
    return view('sistema.reportesgraficos.productos', compact('productos',"categorias"));
}

}
