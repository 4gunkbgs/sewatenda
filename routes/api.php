<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BarangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['middleware' => 'auth:sanctum'])->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::get('/{id}', [BarangController::class, 'show']);

    Route::post('/tambah', [BarangController::class, 'store']);
    Route::put('/update/{id}', [BarangController::class, 'update']);
    Route::delete('/delete/{id}', [BarangController::class, 'destroy']);
});