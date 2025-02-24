<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $table='orden_compra';
    protected $primaryKey = 'id_orden_compra';
    protected $fillable = [
        'ruc',
        'fecha',
        'direccion',
        'sub_total',
        'total',
        'estado'

    ];

    public $timestamps = false;

    // Relación con el modelo proveedor
    public function rproveedor()
    {
        return $this->belongsTo(Proveedor::class, 'ruc');
    }

    public function detalles(){
        return $this->hasMany(DetalleCompra::class,'id_orden_compra','id_orden_compra');
    }



}
