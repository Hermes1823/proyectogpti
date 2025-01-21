<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_Orden_Venta extends Model
{
    use HasFactory;

    protected  $table="indicador_venta";

    protected $fillable=['fecha','hora_inicio','hora_final','diferencia_tiempo','diferencia_segundo'];
    public $timestamps=false;
}
