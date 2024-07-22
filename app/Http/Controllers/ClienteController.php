<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('can:cliente.index')->only('index');
         $this->middleware('can:cliente.create')->only('create');
         $this->middleware('can:cliente.edit')->only('edit');
         $this->middleware('can:cliente.destroy')->only('destroy');
     }
    public function index()
    {
        $clientes=  Cliente::all();
        return view('sistema.cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sistema.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion=$request->validate([
            'DNI' => 'required |string | max:8',
            'nombre'=>'required |string',
            'apellidos'=>'required |string',
            'numero'=>'required |numeric',

        ]);

        $cliente= new Cliente();
        $cliente->DNI=$request->DNI;
        $cliente->nombre=$request->nombre;
        $cliente->apellidos=$request->apellidos;
        $cliente->numero=$request->numero;
        $cliente->estado=1;
        $cliente->save();
        session()->flash('message', 'registro exitoso');
        return redirect()->route('cliente.index');
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
        $cliente= Cliente::find($id);

       return view('sistema.cliente.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion=$request->validate([
            'DNI' => 'required |string | max:8',
            'nombre'=>'required |string',
            'apellidos'=>'required |string',
            'numero'=>'required |numeric',

        ]);

        $cliente= Cliente::find($id);
        $cliente->DNI=$request->DNI;
        $cliente->nombre=$request->nombre;
        $cliente->apellidos=$request->apellidos;
        $cliente->numero=$request->numero;
       // $cliente->estado=1;
        $cliente->save();
        session()->flash('message', 'registro exitoso');
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente= Cliente::find($id);
        $cliente->destroy($id);
        return redirect()->route('cliente.index');
    }
}
