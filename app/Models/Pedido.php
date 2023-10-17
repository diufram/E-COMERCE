<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    //relacion uno a muchos(inversa)

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function pago(){
        return $this->belongsTo('App\Models\Tpago');
    }

    // relacion mucho a muchos 
    public function detalles(){
        return $this->belongsToMany('App\Models\Detalle_Pedido');
    }


}
