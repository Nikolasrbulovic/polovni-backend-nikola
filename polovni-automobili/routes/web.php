<?php

use App\Http\Controllers\CarsController;
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
Route::group(['prefix' => 'cars'], function () {
    Route::get('/', [CarsController::class, 'index']);
    Route::post('/',[ CarsController::class, 'store']);
    Route::get('/{id}', [CarsController::class, 'show']);
    Route::patch('/{id}',[ CarsController::class, 'update']);
    Route::delete('/{id}',[CarsController::class, 'destroy']);
});