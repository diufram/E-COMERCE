<?php

namespace App\Http\Controllers;

use App\Models\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    public function index(){
        $tallas = Talla::paginate();

        //return $tallas;
        return view('tallas.index',compact('tallas'));
    }

    public function create(){
       
        return view('tallas.create');
    }

    public function store(Request $request){
        $talla = new Talla();
        $talla->size = $request->size;

        $talla->save();

        return redirect()->route('tallas.index');
        
       //return $talla;
    }

    public function show(Talla $talla){
        return view('tallas.show',compact('talla'));
    }

    public function edit(Talla $talla){
        return view('tallas.update',compact('talla'));
    }

    public function update(Request $request, Talla $talla){
        $talla->size = $request->size;

        $talla->save();

        return redirect()->route('tallas.index');
        
    }

    public function destroy(Talla $talla){
        $talla->delete();
        return redirect()->route('tallas.index');
    }
}


