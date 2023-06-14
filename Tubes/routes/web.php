<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\FlowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Jenssegers\Mongodb\Auth\User;
use Psy\Readline\Userland;

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



//user
Route::get('/',[FlowController::class,'index']);
Route::get('/user', [UserController::class,'index']);
Route::get('/add', [UserController::class,'add']) -> middleware('is_admin');
Route::post('processAdd', [UserController::class,'processAdd']) ->name('processAddUser')-> middleware('is_admin');
Route::get('/edit/{id}', [UserController::class,'edit'])-> middleware('is_admin');
Route::post('processEdit', [UserController::class,'processEdit'])-> name('processEditUser')-> middleware('is_admin');
Route::get('/delete/{id}',[UserController::class,'delete'])-> name('processDeleteUser') -> middleware('is_admin');



// produk
Route::get('/produk', [App\Http\Controllers\ProdukController::class,'index']);
Route::get('/add-produk', [App\Http\Controllers\ProdukController::class,'add']);
Route::post('processAddProduk', [App\Http\Controllers\ProdukController::class,'processAdd'])->name('processAddProduk');
Route::get('/edit-produk/{id}', [App\Http\Controllers\ProdukController::class,'edit']);
Route::post('processEditProduk', [App\Http\Controllers\ProdukController::class,'processEdit'])->name('processEditProduk');
Route::get('/delete-produk/{id}',[App\Http\Controllers\ProdukController::class,'delete'])->name('processDeleteProduk');

// review
Route::get('/review', [App\Http\Controllers\ReviewController::class,'index']);
Route::get('/add-review', [App\Http\Controllers\ReviewController::class,'add']);
Route::post('processAddReview', [App\Http\Controllers\ReviewController::class,'processAdd'])->name('processAddReview');
Route::get('/edit-review/{id}', [App\Http\Controllers\ReviewController::class,'edit']);
Route::post('processEditReview', [App\Http\Controllers\ReviewController::class,'processEdit'])->name('processEditReview');
Route::get('/delete-review/{id}',[App\Http\Controllers\ReviewController::class,'delete'])->name('processDeleteReview');

// //pembelian
// Route::get('/pembelian', [PembelianController::class,'index']);
// Route::get('/add', [PembelianController::class,'add']) -> middleware('is_admin');
// Route::post('processAdd', [PembelianController::class,'processAdd']) ->name('processAddPembelian')-> middleware('is_admin');
// Route::get('/edit/{id}', [PembelianController::class,'edit'])-> middleware('is_admin');
// Route::post('processEdit', [PembelianController::class,'processEdit'])-> name('processEditPembelian')-> middleware('is_admin');
// Route::get('/delete/{id}',[PembelianController::class,'delete'])->name('processDeletePembelian') -> middleware('is_admin');

// //pengiriman
// Route::get('/pengiriman', [PengirimanController::class,'index']);
// Route::get('/add', [PengirimanController::class,'add']) -> middleware('is_admin');
// Route::post('processAdd', [PengirimanController::class,'processAdd']) ->name('processAddPengiriman')-> middleware('is_admin');
// Route::get('/edit/{id}', [PengirimanController::class,'edit'])-> middleware('is_admin');
// Route::post('processEdit', [PengirimanController::class,'processEdit'])-> name('processEditPengiriman')-> middleware('is_admin');
// Route::get('/delete/{id}',[PengirimanController::class,'delete'])->name('processDeletePengiriman') -> middleware('is_admin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home') -> middleware('is_admin');
