<?php

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

Route::get('/',[FlowController::class,'index']);

Route::controller(App\Http\Controllers\ReviewController::class)->group(function(){
    Route::get('/review','index');
    Route::get('/admin/review', 'adminReview');
    Route::get('/addReview/{id}','add');
    Route::post('/processAddReview','processAdd') ->name('processAddReview');
    Route::get('/editReview/{id}', 'edit');
    Route::post('/processEditReview','processEdit')-> name('processEditReview');
    Route::get('/deleteReview/{id}','delete')->name('processDeleteReview');
});

Route::controller(App\Http\Controllers\ReportController::class)->group(function(){
    Route::get('/report','index');
    Route::get('/admin/report','admin');
});

Route::controller(App\Http\Controllers\PengirimanController::class)->group(function(){
    Route::get('/pengiriman','index');
    Route::get('/detailPengiriman/{id}','detail');
    Route::get('/admin/pengiriman', 'adminPengiriman');
    Route::get('/addPengiriman','add');
    Route::post('/processAddPengiriman','processAdd') ->name('processAddPengiriman');
    Route::get('/editPengiriman/{id}', 'edit');
    Route::get('/sampai/{id}', 'sampai');
    Route::post('/processEditPengiriman','processEdit')-> name('processEditPengiriman');
    Route::post('/processSampai','processSampai')-> name('processSampai');
    Route::get('/deletePengiriman/{id}','delete')->name('processDeletePengiriman');
});

Route::get('/add', [UserController::class,'add']);
Route::post('processAdd', [UserController::class,'processAdd']) ->name('processAddUser');
Route::get('/edit/{id}', [UserController::class,'edit']);
Route::post('processEdit', [UserController::class,'processEdit'])-> name('processEditUser');
Route::get('/delete/{id}',[UserController::class,'delete'])->name('processDeleteUser');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home') -> middleware('is_admin');
