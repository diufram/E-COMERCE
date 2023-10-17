<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Pedido extends Model
{
    use HasFactory;
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    public function pedidos(){
        return $this->belongsTo('App\Models\Pedido');
    }
}
