<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use function Laravel\Prompts\text;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::paginate();

        //return $categorias;
        return view('categorias.index',compact('categorias'));
    }

    public function create(){
       
        return view('categorias.create');
    }

    public function store(Request $request){
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();

        return redirect()->route('categorias.index');
        
       //return $categoria;
    }

    public function show(Categoria $categoria){
        return view('categorias.show',compact('categoria'));
    }

    public function edit(Categoria $categoria){
        return view('categorias.update',compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria){
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;

        $categoria->save();

        return redirect()->route('categorias.show',$categoria);
        
    }

    public function destroy(Categoria $categoria){
        $categoria->delete();

        return redirect()->route('categorias.index');
    }
}
