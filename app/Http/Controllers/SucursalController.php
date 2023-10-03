<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index(){
        $sucursales = Sucursal::paginate();

        //return $sucursal;
        return view('sucursal.index',compact('sucursales'));
    }

    public function create(){
       
        return view('sucursal.create');
    }

    public function store(Request $request){
        $sucursal = new Sucursal();
        $sucursal->nombre = $request->nombre;
        $sucursal->ubicacion = $request->ubicacion;

        $sucursal->save();

       return redirect()->route('sucursals.index');
        
    }

    public function show(Sucursal $sucursal){
        return view('sucursal.show',compact('sucursal'));
    }

    public function edit(Sucursal $sucursal){
        return view('sucursal.update',compact('sucursal'));
    }

    public function update(Request $request, Sucursal $sucursal){
        $sucursal->nombre = $request->nombre;
        $sucursal->ubicacion = $request->ubicacion;

        $sucursal->save();

        return redirect()->route('sucursals.index');
        
    }

    public function destroy(Sucursal $sucursal ){
        $sucursal->delete();
        return redirect()->route('sucursals.index');
    }
}
