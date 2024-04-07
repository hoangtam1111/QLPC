<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
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

Route::get('/', function () {
    return view('index');
});
Route::prefix('admin')->name('admin.')->group(function(){
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
        Route::get('/insert',[TypeController::class,'insert'])->name('insert');
        Route::post('/insert',[TypeController::class,'postInsert'])->name('post-insert');
        Route::get('/update/{id}',[TypeController::class,'update'])->name('update');
        Route::post('/update',[TypeController::class,'postUpdate'])->name('post-update');
        Route::get('/delete/{id}',[TypeController::class,'delete'])->name('delete');
        Route::post('/delete',[TypeController::class,'postDelete'])->name('post-delete');
    });
});
