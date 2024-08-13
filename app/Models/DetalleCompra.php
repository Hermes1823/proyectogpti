<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table ='detalle_orden_compra';
    protected $primaryKey='id';
    protected $fillable=[
        'id_orden_compra',
        'id_producto',
        'cantidad',
        'precio',
    ];
    public $timestamps = false;

    public function ordencompra(){
        return $this->belongsTo(OrdenCompra::class,'id_orden_compra','id_orden_compra');
    }
    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto','id_producto');
    }
}
