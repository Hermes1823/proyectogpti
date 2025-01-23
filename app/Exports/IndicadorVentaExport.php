<?php

namespace App\Exports;

use App\Models\IndicadorVenta;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndicadorVentaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IndicadorVenta::all();
    }
}
