<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Pedido;
use App\Models\Pedido;
use App\Models\VentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaControllerController extends Controller
{
    public function index(){
        $ventas =Pedido::all();
        return view('ventas.index',compact('ventas'));
    }

    public function show(Pedido $venta) {
        $detalles = DB::select('SELECT * FROM detalle__pedidos WHERE pedido_id = ?',[$venta->id]);
        //return response()->json($detalles,200);
        return view('ventas.show',compact('detalles','venta'));
    }
}
