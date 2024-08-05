<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenVenta extends Model
{
    use HasFactory;
    protected $table='orden_venta';
    protected $fillable=['total','direccion','fecha','dni'];
    protected $primaryKey='id_orden_venta';
    public $timestamps = false;

    public function detalles(){
        return $this->hasMany(DetalleVenta::class,'id_orden_venta','id_orden_venta');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'dni','dni');
    }
}
