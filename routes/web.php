<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\VentaControllerController;
use App\Models\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/home', function () {
    return view('home');
})->name('hola');
*/

Route::middleware('auth')->group(function () {

    

    Route::get('productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.delete');

    Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
    Route::get('categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.delete');
    

    //SUCURSALES
    Route::get('sucursals', [SucursalController::class, 'index'])->name('sucursals.index');
    Route::get('sucursals/create', [SucursalController::class, 'create'])->name('sucursals.create');
    Route::post('sucursals', [SucursalController::class, 'store'])->name('sucursals.store');
    Route::get('sucursals/{sucursal}/edit', [SucursalController::class, 'edit'])->name('sucursals.edit');
    Route::put('sucursals/{sucursal}', [SucursalController::class, 'update'])->name('sucursals.update');
    Route::delete('sucursals/{sucursal}', [SucursalController::class, 'destroy'])->name('sucursals.delete');

    Route::get('tallas', [TallaController::class, 'index'])->name('tallas.index');
    Route::get('tallas/create', [TallaController::class, 'create'])->name('tallas.create');
    Route::post('tallas', [TallaController::class, 'store'])->name('tallas.store');
    Route::get('tallas/{talla}/edit', [TallaController::class, 'edit'])->name('tallas.edit');
    Route::put('tallas/{talla}', [TallaController::class, 'update'])->name('tallas.update');
    Route::delete('tallas/{talla}', [TallaController::class, 'destroy'])->name('tallas.delete');
    

    
    
    Route::get('carrito-compra', [CarritoController::class, 'carrito'])->name('ir.a.carrito');

    Route::get('producto/{id}', [CarritoController::class, 'agregarACarrito'])->name('agregar.a.carrito');

    Route::delete('delete-producto', [CarritoController::class, 'deleteProducto'])->name('eliminar.producto.carrito');

    Route::post('home',[CarritoController::class,'venta'])->name('venta.create');






    Route::get('ventas',[VentaControllerController::class,'index'])->name('ventas.index');
    Route::delete('ventas/{venta}', [VentaControllerController::class, 'delete'])->name('ventas.delete');
    Route::get('ventas/{venta}',[VentaControllerController::class, 'show'])->name('ventas.show');

    
});

Route::controller(AuthController::class)->group( function(){
    Route::get('registro','registro')->name('registro');
    Route::post('registro','registroSave')->name('registro.save');
    
    Route::get('iniciar','iniciar')->name('iniciar');
    Route::post('iniciar','iniciarAction')->name('iniciar.Action');
    
    Route::post('cierre','cierre')->name('cierre');
    Route::post('cierre','cierreSesion')->name('cierre.Sesion');
    
});


    Route::get('home', [CarritoController::class, 'index'])->name('carrtio.index');


    
/*
Route::get('/product', function () {
    return view('Producto.index');
});*/

require __DIR__.'/auth.php';
