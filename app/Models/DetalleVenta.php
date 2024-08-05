<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table= 'detalle_orden_venta';
    protected $primaryKey='id';
    protected  $fillable=
    [
        'id_orden_venta','
        id_producto',
        'cantidad',
        'precio'
    ];
    public $timestamps = false;

    public function orden_venta(){
        return $this->hasOne(OrdenVenta::class,'id_orden_venta','id_orden_venta');
    }

    public function producto(){
        return $this->hasOne(Producto::class,'id_producto','id_producto');
    }
}
