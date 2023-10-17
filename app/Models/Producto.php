<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    public function sucursal(){
        return $this->belongsTo('App\Models\Sucursal');
    }

    //relacion muchos a muchos 
    public function pedidos(){
        return $this->belognsToMany('App\Models\Pedido');
    }

    public function talla(){
        return $this->belongsTo('App\Models\Talla');
    }

    public function images(){
        return $this->hasMany('App\Models\Image');
    }

    public function detalles(){
        return $this->belongsToMany('App\Models\Detalle_Pedido');
    }
}
