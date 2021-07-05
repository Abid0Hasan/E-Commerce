<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::group(['middleware' => ['auth']], function (){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [App\Http\Controllers\HomeController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [App\Http\Controllers\HomeController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [App\Http\Controllers\HomeController::class, 'remove'])->name('remove.from.cart');
    Route::get('checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
});





//Admin route
Route::group(['as'=>'admin.','prefix'=>'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('order', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('order.index');
    Route::post('order/{id}',[App\Http\Controllers\Admin\OrderController::class, 'status'])->name('order.status');
    Route::delete('order/destroy/{id}', [App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('order.destroy');

    Route::resource('products', '\App\Http\Controllers\Admin\ProductController');


});



