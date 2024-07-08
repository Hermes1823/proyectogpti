<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $proveedores=Proveedor::all();
        return view('sistema.proveedor.listProveedor', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //''
        return view ('sistema.proveedor.addProveedor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = $request->validate([
            'ruc' => 'required|string|max:25',
            'razon_social' => 'required |string|max:60',
            'direccion' => 'required |string|max:60',
            'encargado' => 'required |string|max:60',
        ]);

        $proveedor = new Proveedor();

        $proveedor->ruc = $request->input('ruc');
        $proveedor->razon_social = $request->input('razon_social');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->encargado = $request->input('encargado');
       

        $proveedor->save();

        //return back()->with('message','registro exitoso');

        session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return redirect()->route('proveedor.create');
        //return $proveedor;
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
        $proveedor=Proveedor::find($id);
        return view('sistema.proveedor.editProveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion = $request->validate([
            'ruc' => 'required|string|max:25|unique:proveedores,ruc,' . $id . ',ruc',
            'razon_social' => 'required |string|max:60',
            'direccion' => 'required |string|max:60',
            'encargado' => 'required |string|max:60',
        ]);

        $proveedor=Proveedor::find($id);
        

        $proveedor->ruc = $request->input('ruc');
        $proveedor->razon_social = $request->input('razon_social');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->encargado = $request->input('encargado');
       //$proveedor->update($request->all());

        $proveedor->save();

        //return back()->with('message','registro exitoso');

        //session()->flash('message', 'registro exitoso');

        // Redirigir a la vista categoria.create
        return back()->with('message','Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor=Proveedor::find($id);
        $proveedor->delete();
        return back();
    }
}
