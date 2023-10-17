<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function producto(){
        $productos = Producto::all();
        return response()->json($productos,200);
    }
}
