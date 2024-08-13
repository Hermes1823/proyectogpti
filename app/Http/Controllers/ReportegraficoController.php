<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportegraficoController extends Controller
{
    public function index(){

        
        return view('sistema.reportesgraficos.graficos');
        

    }
}
