<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin-login',[AdminController::class,'loginView']);
Route::post('/admin-login',[AdminController::class,'login']);

Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('admin-categories',[AdminController::class,'categories']);
Route::get('logout',[AdminController::class,'logout']);

Route::post('addCategory',[AdminController::class,'addCategory']);
Route::get('category/delete/{id}',[AdminController::class,'deleteCategory']);

