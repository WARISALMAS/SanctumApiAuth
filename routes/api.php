<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
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


// Route::middleware('auth:sanctum')->get('/user', function () {
//     Route::get('/products/search/{name}',[ProductController::class,'search']);
// });


// the bellow route also works 
// Route::middleware('auth:sanctum')->get('/products/search/{name}',[ProductController::class,'search']);


// Route::middleware('auth:sanctum')->get('/book', 'App\Http\Controllers\BookController@index');
// Route::get('/book', 'App\Http\Controllers\BookController@index');

// Route::get('/products',[ProductController::class,'index']);

// Route::post('/products',[ProductController::class,'store']);
// Route::get('/products/{id}',[ProductController::class,'show']);



// this works
// Route::resource('products',ProductController::class);


// public routes
Route::get('/products/search/{name}',[ProductController::class,'search']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
//protected routes 
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});