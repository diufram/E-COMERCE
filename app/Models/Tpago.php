<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpago extends Model
{
    use HasFactory;
    public function pedidos(){
        return $this->belongsTo('App\Models\Pedido');
    }
}
