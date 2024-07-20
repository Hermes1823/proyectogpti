<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table= 'pedido';
    protected $fillable=['fecha','direccion','dni'];
    protected $primaryKey='id_pedido';
    public $timestamps = false;

    public function cliente(){
       
        
            return $this->belongsTo(Cliente::class,'dni','dni');
      
    }
}
