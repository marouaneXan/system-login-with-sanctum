<?php

use App\Models\Product;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/





//Public routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/products',[ProductController::class,'index']);
Route::get('products/search/{name}',[ProductController::class,'search']);
Route::get('/products/{id}',[ProductController::class,'show']);


//Pretected route
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/products',[ProductController::class,'store']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::put('/products/{id}',[ProductController::class,'update']);
});
