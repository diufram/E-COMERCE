<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Image;
use App\Models\Producto;
use App\Models\Sucursal;
use App\Models\Talla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(){
       $productos =  Producto::paginate();
       return view('productos.index',compact('productos'));
    }

    public function create(){
        $tallas = Talla::all();
        $sucursales = Sucursal::all();
        $categorias = Categoria::all();
        return view('productos.create',compact('tallas','sucursales','categorias'));
    }

    public function store(Request $request){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->talla_id = $request->talla_id;
        $producto->color = $request->color;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->categoria_id = $request->categoria_id;
        $producto->sucursal_id = $request->sucursal_id;
        
        $producto->save();

        $request->validate([
            'file.*' =>'required|image'
        ]);

        $files = $request->file('files');

        foreach ($files as $file){

            $image = new Image();
            $token = $file->store('public');
            $url = Storage::url($token);
            $image->producto_id = $producto->id;
            $image->url = $url;
            $image->save();
        }
        
        return redirect()->route('productos.index',$producto);

    }

    public function show(Producto $producto){
        return view('productos.show',compact('producto'));
    }

    public function edit(Producto $producto){
        $tallas = Talla::all();
        $sucursales = Sucursal::all();
        $categorias = Categoria::all();
        return view('productos.update',compact('producto','sucursales','categorias','tallas'));
    }

    public function update(){
        
    }

    public function destroy(Producto $producto){
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
