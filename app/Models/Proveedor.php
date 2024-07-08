<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    protected $primaryKey = 'ruc';
    protected $fillable = ['ruc, razon_social, direccion, encargado'];
    public $timestamps = false;
}