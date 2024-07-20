<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenVenta extends Model
{
    use HasFactory;
    protected $table='orden_venta';
    protected $fillable=['total','subtotal','fecha'];
    protected $primaryKey='id_pedido';
    public $timestamps = false;
}
