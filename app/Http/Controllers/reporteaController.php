<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reportea;

class reporteaController extends Controller
{
    public function index(){
        $navegadores=Reportea::all();

        $puntos=[];
        foreach($navegadores as $navegador){

            $puntos[]=['name' => $navegador['nombre'], 'y'=>floatval($navegador['porcentaje'])];
        }
        return view('reportea', ['data'=>json_encode($puntos)]);
    }
}
