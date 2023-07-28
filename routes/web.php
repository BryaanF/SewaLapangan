<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
Route::get('/formsewa', [App\Http\Controllers\HomeController::class, 'formsewa'])->name('formsewa');
Route::get('/formsewa/store', [App\Http\Controllers\HomeController::class, 'sewastore'])->name('formsewa.store');



// admin route
Route::get('admin/request_sewa_lapangan', [AdminController::class, 'reqsewa'])->name('reqsewa');
Route::get('admin/acc_request_sewa/{id}', [AdminController::class, 'accreqsewa'])->name('accreqsewa');
Route::get('admin/tolak_request_sewa/{id}', [AdminController::class, 'tlkreqsewa'])->name('tlkreqsewa');
Route::get('admin/acc_sewa_lapangan', [AdminController::class, 'accsewa'])->name('accsewa');
Route::get('admin/batal_acc_sewa/{id}', [AdminController::class, 'btlaccsewa'])->name('btlaccsewa');
Route::get('admin/exportPdf/{id}', [AdminController::class, 'exportPdf'])->name('exportPdf');
Route::resource('admin', AdminController::class);


