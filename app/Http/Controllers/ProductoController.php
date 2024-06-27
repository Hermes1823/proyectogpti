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
        $productos=Producto::all();

        return view('sistema.producto.listProducto', compact('productos'));
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
            'imagen' => 'nullable',
            'id_medida' => 'required|exists:unidad_medida,id_medida',
            'id_marca' => 'required|exists:marca,id_marca',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'cantidad' => 'required|integer',
            'id_categoria' => 'required|exists:categoria,id_categoria',
        ]);

        $producto = new Producto();

        $producto->descripcion = $request->input('descripcion');
        $producto->imagen = $request->input('imagen'); //este es un texarea 
        $producto->id_medida = $request->input('id_medida');// este es un select 2 y agarra la variable desripcion de medida
        $producto->id_marca = $request->input('id_marca');// este es un select 2 y agarra la variable desripcion de marca
        $producto->precio_venta = $request->input('precio_venta');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->cantidad = $request->input('cantidad');
        $producto->id_categoria = $request->input('id_categoria');// este es un select 2 y agarra la variable desripcion de categoria

        $producto->save();

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('producto.create');
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
        $producto=Producto::find($id);
        $unidades = UnidadMedida::all();
        $marcas = Marca::all();
        $categorias = Categoria::all();

        // Retornar la vista de edición con los datos del producto y las listas de opciones
        return view('sistema.producto.editProducto', compact('producto', 'unidades', 'marcas', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario de edición
        $validacion = $request->validate([
            'descripcion' => 'required|string|max:60',
            'imagen' => 'nullable',
            'id_medida' => 'required|exists:unidad_medida,id_medida',
            'id_marca' => 'required|exists:marca,id_marca',
            'precio_venta' => 'required|numeric',
            'precio_compra' => 'required|numeric',
            'cantidad' => 'required|integer',
            'id_categoria' => 'required|exists:categoria,id_categoria',
        ]);

        // Buscar el producto por su ID
        $producto = Producto::find($id);

        // Actualizar los campos del producto con los nuevos valores del formulario
        $producto->descripcion = $request->input('descripcion');
        $producto->imagen = $request->input('imagen');
        $producto->id_medida = $request->input('id_medida');
        $producto->id_marca = $request->input('id_marca');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->cantidad = $request->input('cantidad');
        $producto->id_categoria = $request->input('id_categoria');

        // Guardar los cambios en la base de datos
        $producto->save();

        // Redireccionar a la vista de listado de productos o a donde sea necesario
        return back()->with('message','Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto=Producto::find($id);
        $producto->delete();
        return back();
    }
}
