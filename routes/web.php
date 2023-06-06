<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GudangController;
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
    return view('register');
});

Route::get('/index', function () {
    return view('index');
});

Route::redirect('home','index');
Route::get('/auth/callback',[authController::class, "login"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout',[authController::class,"logout"]);
Route::get('/register', [LoginController::class,"register"]);

Route::get('/pegawai',[PegawaiController::class,"index"]);
Route::get('/pegawai/create',[PegawaiController::class,"create"]);
Route::post('/pegawai/store',[PegawaiController::class, "store"]);
Route::get('/pegawai/edit/{id}',[PegawaiController::class,"edit"]);
Route::post('/pegawai/update',[PegawaiController::class, "update"]);
Route::get('/pegawai/destroy/{id}',[PegawaiController::class,"destroy"]);

Route::get('/gudang',[GudangController::class,"index"]);
Route::get('/gudang/create',[GudangController::class,"create"]);
Route::post('/gudang/store',[GudangController::class, "store"]);
Route::get('/gudang/edit/{id}',[GudangController::class,"edit"]);
Route::post('/gudang/update',[GudangController::class, "update"]);
Route::get('/gudang/destroy/{id}',[GudangController::class,"destroy"]);
