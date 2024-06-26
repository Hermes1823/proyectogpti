<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\UnidadMedida;
use App\Models\Marca;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = UnidadMedida::all();
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('sistema.producto.addProducto', compact('unidades', 'marcas', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'descripcion' => 'required|string|max:60',
            'imagen' => 'nullable|file',
            'id_medida' => 'required|exists:unidad_medida,id_medida',
            'id_marca' => 'required|exists:marca,id_marca',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'cantidad' => 'required|integer',
            'id_categoria' => 'required|exists:categoria,id_categoria',
        ]);

        $producto = new Marca();

        $producto->descripcion = $request->input('descripcion');

        $producto->save();

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('producto.create');
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
        //
    }
}
