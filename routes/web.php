<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

//protected routs
Route::middleware([ 'auth'])->group(function () {
    Route::get('/', [ProductController::class, 'index']);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
        Route::post('/product/order/{id}', [ProductController::class, 'orderProduct'])->name('order-product');
        Route::resources([
            'products' => ProductController::class,
            'order' => OrderController::class,
        ]);
    });
