<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $table ='orden_compra';
    protected $primaryKey='id_orden_compra';
    protected $fillable=[
        'fecha',
        'direccion',
        'sub_total',
        'total',
        'ruc'
    ];
    public $timestamps = false;

    
}
