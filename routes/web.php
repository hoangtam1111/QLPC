<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/profile',[UserController::class,'index'])->name('profile');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('products')->name('products.')->group(function(){
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/detail/{id}',[ProductController::class,'detail'])->name('detail');
});

Route::prefix('cart')->name('cart.')->group(function (){
    Route::get('/cart',[CartController::class,'index'])->name('index');
    Route::post('/insert_cart',[CartController::class,'insert'])->name('insert-cart');
    Route::post('/update_quantity',[CartController::class,'update'])->name('update-cart');
    Route::post('/delete_cart',[CartController::class,'delete'])->name('delete-cart');
});
Route::prefix('order')->name('order.')->group(function (){
    Route::get('/index',[OrderController::class,'index'])->name('index');
    Route::post('/buy',[OrderController::class,'buy'])->name('buy');
});
Route::get('type',[TypeController::class,'type'])->name('type');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');

    Route::prefix('brand')->name('brand.')->group(function(){
        Route::get('/',[BrandController::class,'index'])->name('index');
        Route::get('/insert',[BrandController::class,'insert'])->name('insert');
        Route::post('/insert',[BrandController::class,'postInsert'])->name('post-insert');
        Route::get('/update/{id}',[BrandController::class,'getUpdate'])->name('update');
        Route::post('/update',[BrandController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[BrandController::class,'delete'])->name('delete');
        Route::post('/delete',[BrandController::class,'postDelete'])->name('post-delete');
    });

    Route::prefix('type')->name('type.')->group(function(){
        Route::get('/',[TypeController::class,'index'])->name('index');
        Route::get('/insert',[TypeController::class ,'insert'])->name('insert');
        Route::post('/insert',[TypeController::class,'postInsert'])->name('post-insert');
        Route::get('/update/{id}',[TypeController::class,'update'])->name('update');
        Route::post('/update',[TypeController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[TypeController::class,'delete'])->name('delete');
        Route::post('/delete',[TypeController::class,'postDelete'])->name('post-delete');
    });
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/detail/{id}',[UserController::class,'detail'])->name('detail');
        Route::get('/insert',[UserController::class,'insert'])->name('insert');
        Route::post('/insert',[UserController::class,'postInsert'])->name('post-insert');
        Route::get('/update/{id}',[UserController::class,'update'])->name('update');
        Route::post('/update',[UserController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[UserController::class,'delete'])->name('delete');
        Route::post('/delete',[UserController::class,'postDelete'])->name('post-delete');
    });
    Route::prefix('products')->name('products.')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/detail/{id}',[ProductController::class,'detail'])->name('detail');
        Route::get('/insert',[ProductController::class ,'insert'])->name('insert');
        Route::post('/insert',[ProductController::class,'postInsert'])->name('post-insert');
        Route::get('/update/{id}',[ProductController::class,'getUpdate'])->name('update');
        Route::post('/update',[ProductController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[ProductController::class,'delete'])->name('delete');
        Route::post('/delete',[ProductController::class,'postDelete'])->name('post-delete');
    });
});

