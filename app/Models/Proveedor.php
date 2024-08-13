<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';
    protected $primaryKey = 'ruc';
    protected $fillable = ['ruc, razon_social, direccion, encargado'];
    public $timestamps = false;

    public function ordenesCompras(){
        return $this->hasMany(OrdenCompra::class,'ruc','ruc');
    }
}
