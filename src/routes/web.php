<?php

use Illuminate\Support\Facades\Route;

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
//viewのブラウザ上での表示確認用のルート//
Route::get('/login', function () {return view('auth.login');})->name('login');
Route::get('/register', function () {return view('auth.register');})->name('register');
Route::get('/register/step2', function () {return view('auth.register_step2');})->name('register_step2');

Route::get('/weight_logs', function () {return view('weight_logs.index');})->name('weight_logs.index');