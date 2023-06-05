<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'cars'], function () {
    Route::get('/', [CarsController::class, 'index']);
    Route::post('/',[ CarsController::class, 'store']);
    Route::get('/{id}', [CarsController::class, 'show']);
    Route::patch('/{id}',[ CarsController::class, 'update']);
    Route::delete('/{id}',[CarsController::class, 'destroy']);
});