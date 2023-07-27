<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('index');
});

Auth::routes();

// user route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sewalapangan', [App\Http\Controllers\HomeController::class, 'sewalapangan'])->name('sewalapangan');


// admin route
Route::get('admin/request_sewa_lapangan', [App\Http\Controllers\HomeController::class, 'reqsewa'])->name('reqsewa');
Route::get('admin/acc_sewa_lapangan', [App\Http\Controllers\HomeController::class, 'accsewa'])->name('accsewa');
Route::resource('admin', AdminController::class);


