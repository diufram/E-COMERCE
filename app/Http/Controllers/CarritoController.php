<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

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
}
