<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;
use App\Http\Controllers\RegisterController;



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

Route::get('/login', [RegisterController::class, 'index'])->name('login');
Route::get('/register/step1', [RegisterController::class, 'step1'])->name('register_step1');
Route::get('/register/step2', [WeightTargetController::class, 'step2'])->name('register_step2');
Route::post('/register/step2', [WeightTargetController::class, 'storeStep2'])->name('register_step2_store');

Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');
Route::post('/weight_logs', [WeightLogController::class, 'storeModal'])->name('weight_logs.store');//モーダルからの登録処理ルート
Route::get('/weight_logs/create', [WeightLogController::class, 'create'])->name('weight_logs.create'); //モーダル表示ルート
Route::get('/weight_logs/search', [WeightLogController::class, 'search'])->name('weight_logs.search');
Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'goalSetting'])->name('weight_logs.goal_setting');
Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'updateGoal'])->name('weight_logs.update_goal');
Route::get('/weight_logs/{weightLogId}', [WeightLogController::class, 'detail'])->name('weight_logs.detail');
Route::patch('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update'])->name('weight_logs.update');
Route::get('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'delete'])->name('weight_logs.delete');
Route::get('/logout', [RegisterController::class, 'logout'])->name('weight_logs.logout');
