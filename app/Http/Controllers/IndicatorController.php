<?php

namespace App\Http\Controllers;

use App\Exports\IndicadorReabastecimientoExport;
use App\Models\Test_reabesticimiento;
use Illuminate\Http\Request;
use App\Exports\IndicadorVentaExport;
use Maatwebsite\Excel\Facades\Excel;

class IndicatorController extends Controller
{
    public function salesIndicator() {
        return view('sistema.indicador.ventas');
    }
    public function reabastecimientoIndicator() {
        return view('sistema.indicador.reabastecimiento');
    }

    public function exportSalesIndicator()
    {
        return Excel::download(new IndicadorVentaExport, 'indicador_venta.xlsx');
    }
    public function exportReabastecimientoIndicator()
    {

        return Excel::download(new IndicadorReabastecimientoExport, 'indicador_reabastecimiento.xlsx');
    }
}
