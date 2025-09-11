<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::view('/admin','admin-login');
Route::post('/admin',[AdminController::class,'login']);
Route::get('/dashboard',[AdminController::class,'dashboard']);
