<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenProducto extends Model
{
    use HasFactory;
    protected $table ='almacen_producto';
    protected $fillable=['stock','id_producto','id_almacen'];
    protected $primaryKey='id';
    public $timestamps = false;

    // function almacen(){
    //     return $this->hasOne(Almacen::class,'id_almacen','id_almacen');
    // }
    // function producto(){
    //     return $this->hasOne(Producto::class,'id_producto','id_producto');
    // }
}
