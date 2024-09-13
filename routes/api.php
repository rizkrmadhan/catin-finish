<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCatinController;

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

Route::middleware(['auth:sanctum', 'role:admin,user'])->group(function () {
    Route::get('catins', [ApiCatinController::class, 'index']);
    Route::get('catins/{id}', [ApiCatinController::class, 'show']);
    Route::post('catins', [ApiCatinController::class, 'store']);
    Route::put('catins/{id}', [ApiCatinController::class, 'update']);
    Route::delete('catins/{id}', [ApiCatinController::class, 'destroy']);
});
