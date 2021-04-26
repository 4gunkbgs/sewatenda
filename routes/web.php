<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('/', [HomeController::class, 'index']);
Route::get('/cari', [HomeController::class, 'cari']);

Route::group(['auth:sanctum', 'verified'], function(){
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::get('/tambah', [AdminController::class, 'create'])->name('create');
        Route::post('/tambah', [AdminController::class, 'store'])->name('tambah');

        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [AdminController::class, 'update'])->name('simpan');

        Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('hapus');                

        Route::get('/cari', [AdminController::class, 'cari']);
    });
});