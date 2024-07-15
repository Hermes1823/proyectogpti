<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //

         $marcas=Marca::all();
         return view('sistema.marca.listMarca', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('sistema.marca.addMarca');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([
            'descripcion' => 'required |string | max:60'
        ]);

        $marca=new Marca();

        $marca->descripcion=$request->input('descripcion');

        $marca->save();

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('marca.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca=Marca::find($id);
        return view('sistema.marca.editMarca', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marca=Marca::find($id);

        $marca->descripcion=$request->input('descripcion');

        $marca->save();

        return back()->with('message','Actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca=Marca::find($id);
        $marca->delete();
        return back();
    }
 }

