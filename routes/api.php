<?php

use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);


Route::get('producto',[ProductoController::class,'producto']);

Route::group(['middleware'=>["auth:sanctum"]],function(){
    Route::get('logout',[UserController::class,'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
