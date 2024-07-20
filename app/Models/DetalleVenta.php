<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table= 'detalle_orden_compra';
    protected $primaryKey='id';
    protected  $fillable=
    [
        'id_orden_compra','
        id_producto',
        'cantidad',
        'precio'
    ];
    public $timestamps = false;
}
