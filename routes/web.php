<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'submitForm']);


Route::middleware([CheckIsLogged::class])->group(function(){
  Route::get('/', [MainController::class, 'index']);
  Route::get('/newNote', [MainController::class, 'newNote']);
  Route::get('/logout', [AuthController::class, 'logout']);
});
