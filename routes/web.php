<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;

//? ------------------------------------------------ GUEST ----------------------------------------------------Ooo

Route::get('/',[HomeController::class,'home']);
Route::get('/Menu',[HomeController::class,'menu'])->name('Menu');
Route::get('/Produk',[HomeController::class,'produk'])->name('Produk');
Route::get('/Location',[HomeController::class,'location'])->name('Location');
Route::get('/Contact',[HomeController::class,'contact'])->name('Contact');
Route::get('add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::get('removeFromCart/{id}', [HomeController::class, 'removeFromCart'])->middleware(['auth', 'verified'])->name('removeFromCart');

//! ------------------------------------------------ END GUEST ------------------------------------------------

Route::post('/initiate-payment', [PaymentController::class, 'initiatePayment'])->name('initiate-payment');

//? ------------------------------------------------ HOME ----------------------------------------------------Ooo

Route::get('/dashboard', function () {return view('home.index');})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//! ------------------------------------------------ END HOME -------------------------------------------------

//? ------------------------------------------------ ADMIN ----------------------------------------------------Ooo

Route::get('admin/dashboard',[AdminController::class,'view_category'])->middleware(['auth','ADMIN']); // sementara
Route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','ADMIN']);
Route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','ADMIN']);
Route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','ADMIN']);
Route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','ADMIN']);
Route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','ADMIN']);

Route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','ADMIN']);
Route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','ADMIN']);
Route::get('add_coffee',[AdminController::class,'add_coffee'])->middleware(['auth','ADMIN']);
Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','ADMIN']);
Route::post('upload_coffee',[AdminController::class,'upload_coffee'])->middleware(['auth','ADMIN']);
Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','ADMIN']);
Route::get('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','ADMIN']);
Route::post('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','ADMIN']);

//! ------------------------------------------------ END ADMIN ------------------------------------------------

