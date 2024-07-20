<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;
    protected $table='almacen';
    protected $fillable=['direccion','estado'];
    protected $primaryKey='id_almacen';
    public $timestamps = false;

    // function almacenProducto(){
    //     return $this->hasMany(AlmacenProducto::class,'id_almacen','id_almacen');
    // }

    public function muchosProductos(){
        return $this->belongsToMany(Producto::class,'almacen_producto','id_almacen','id_producto');
    }
}
