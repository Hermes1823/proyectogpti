<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table='cliente';
    protected $fillable=['nombre','apellidos','numero','estado'];
    protected $primaryKey='dni';
    public $timestamps = false;

    function ordenesVenta(){
        return $this->hasMany(OrdenVenta::class,'dni','dni');
    }
}
