<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('sesi/index');
});

Route::resource('siswa', SiswaController::class);

Route::resource('admin', AdminController::class);

Route::get('/sesi',[SessionController::class, 'index']);
Route::post('/sesi/login',[SessionController::class, 'login']);
Route::get('/sesi/logout',[SessionController::class, 'logout']);    
Route::get('/sesi/register',[SessionController::class, 'register']);    
Route::post('/sesi/create',[SessionController::class, 'create']);    

