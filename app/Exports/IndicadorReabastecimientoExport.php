<?php

namespace App\Exports;


use App\Models\Test_reabesticimiento;
use Maatwebsite\Excel\Concerns\FromCollection;

class IndicadorReabastecimientoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Test_reabesticimiento::all();
    }
}
