<?php

namespace App\Exports;

use App\Models\IndicadorVenta;
use App\Models\Test_busqueda;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndicadorBusquedaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Test_busqueda::all();
    }
}
