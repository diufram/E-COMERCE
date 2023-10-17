<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Pedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return view('index',compact('productos'));
    }
    public function agregarACarrito($id){
        $producto = Producto::findOrFail($id);
        $carrito =session()->get('carrito',[]);
        if(isset($carrito[$id])){
            $carrito[$id]['cantidad']++;
        }else{
            $carrito[$id] = [
                "producto_id"=> $producto->id,
                "nombre"=> $producto->nombre ,
                "cantidad"=> 1,
                "precio"=> $producto->precio ,
                "image"=> $producto->images[0]->url,
            ];
        }
        session()->put('carrito',$carrito);
        return redirect()->back()->with('success','Producto agregado al carrito');
    }

    public function carrito(){
        return view('carrito');
    }

    public function deleteProducto(Request $request){
        if($request->id){
            $carrito = session()->get('carrito');
            if(isset($carrito[$request->id])){
                unset($carrito[$request->id]);
                session()->put('carrito',$carrito);
            }
            session()->flash('success','Producto eliminado');
        }
    }

    public function venta(){
        $carrito = session()->get('carrito');
        
        $venta =new  Pedido();
        $venta->user_id  = Auth::user()->id;
        $venta->estado = 'E';
        $venta->pago_id = 1;
        $total = 0;
        $venta->total = $total;
        $venta->save();  
        
        foreach($carrito as $product){
            $total += $product['cantidad'] * $product['precio'];
            $detalle = new Detalle_Pedido();
            $detalle->cantidad = $product['cantidad'];
            $detalle->pedido_id = $venta->id;
            $detalle->nombre = $product['nombre'];
            $detalle->precio = $product['precio'];
            $detalle->producto_id = $product['producto_id'];
            $detalle->save();
        }
        $venta->total= $total;
        $venta->total = $total;
        $venta->save();  
        $productos = Producto::all();
        session()->forget('carrito');
        return view('index',compact('productos'));

    }
}
