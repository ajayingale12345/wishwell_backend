<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/register', [App\Http\Controllers\AdminController::class, 'register']);
Route::post('/register', [App\Http\Controllers\AdminController::class,'store'])->name('register');
Route::get('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('login')->middleware('guest:admin');
Route::post('/login', [App\Http\Controllers\AdminController::class, 'loginsubmit']);
Route::post('/logout',[App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
Route::put('/approve/{id}', [App\Http\Controllers\DashboardController::class, 'approve'])->name('approve');
Route::put('/deny/{id}', [App\Http\Controllers\DashboardController::class, 'deny'])->name('deny');
Route::delete('/disable/{id}',[App\Http\Controllers\DashboardController::class,'disable'])->name('disable');//
Route ::middleware('auth:admin')->group(function () {
    Route::get('/dashboard',  [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
 });

 Route::post('/refund/{id}', [App\Http\Controllers\DashboardController::class, 'refund'])->name('refund');