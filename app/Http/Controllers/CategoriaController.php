<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:categoria.index')->only('index');
        $this->middleware('can:categoria.create')->only('create');
        $this->middleware('can:categoria.edit')->only('edit');
        $this->middleware('can:categoria.destroy')->only('destroy');
    }
    public function index()
    {
        //
        $categorias=Categoria::all();
        return view('sistema.categoria.listCategoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sistema.categoria.addCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([
            'descripcion' => 'required |string | max:60'
        ]);

        $categoria=new Categoria();

        $categoria->descripcion=$request->input('descripcion');

        $categoria->save();

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('categoria.create');
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
    public function edit(string $id)//para mostrar la vista edit con los valores correspodientes
    {
        $categoria=Categoria::find($id);
        return view('sistema.categoria.editCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)//para actualizar ya los valores en si en la base de datos
    {
        //
        $categoria=Categoria::find($id);

        $categoria->descripcion=$request->input('descripcion');

        $categoria->save();

        return back()->with('message','Actualizado correctamente');
        



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categoria=Categoria::find($id);
        $categoria->delete();
        return back();
    }
}
