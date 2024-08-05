<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table='producto';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'descripcion',
        'imagen',
        'id_medida',
        'id_marca',
        'precio_venta',
        'precio_compra',
        'cantidad',
        'id_categoria'
    ];
    public $timestamps = false;

    // Relación con el modelo UnidadMedida
    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'id_medida');
    }

    // Relación con el modelo Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }

    // Relación con el modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }


    // Relacion de muchos a muchos con repecto a Ordenes de compra
    public function ordenesCompras(){
        return $this->belongsToMany(OrdenCompra::class,'detalle_orden_compra','id_producto','id_orden_compra');
    }

     // Relacion de muchos a muchos con repecto a Ordenes de venta
     public function ordenesVentas(){
        return $this->belongsToMany(OrdenVenta::class,'detalle_orden_venta','id_prodcuto','id_orden_venta');
    }
}
