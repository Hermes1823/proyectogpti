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
        return $this->belongsTo(UnidadMedida::class, 'id_medida','id_medida');
    }

    // Relación con el modelo Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca','id_marca');
    }

    // Relación con el modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria','id_categoria');
    }


    // Relacion de muchos a muchos con repecto a Ordenes de compra
    public function detalles(){
        return $this->hasMany(DetalleCompra::class,'id_producto','id_producto');
    }

     // Relacion de muchos a muchos con repecto a Ordenes de venta
     public function detalleVenta(){
        return $this->hasMany(DetalleVenta::class,'id_producto','id_prodcuto');
    }
}
