<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table='cliente';
    protected $fillable=['nombre','apellidos','numero','estado'];
    protected $primarykey='dni';
    public $timestamps = false;

    function pedidos(){
        return $this->hasMany(Pedido::class,'dni','dni');
    }
}
