<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IndicadorVentaExport;
use Maatwebsite\Excel\Facades\Excel;

class IndicatorController extends Controller
{
    public function salesIndicator() {
        return view('sistema.indicador.ventas');
    }

    public function exportSalesIndicator()
    {
        return Excel::download(new IndicadorVentaExport, 'indicador_venta.xlsx');
    }
}
