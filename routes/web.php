<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\DashboardPage;

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
Route::get('/cari/barang', [HomeController::class, 'cari'])->name('search2');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/sewa', [HomeController::class, 'sewa']);
    
    Route::middleware(['admin'])->group(function () {
        // Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        Route::get('/dashboard', DashboardPage::class)->name('dashboard');

        // Route::get('/tambah', [AdminController::class, 'create'])->name('create');
        // Route::get('/tambah', Dashboard::class)->name('create');
        
        Route::post('/tambah', [AdminController::class, 'store'])->name('tambah');

        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [AdminController::class, 'update'])->name('simpan');

        Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('hapus');                
        
        Route::get('/cari', [AdminController::class, 'cari'])->name('search1');
    });
});