<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PajakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([ 'prefix' => 'items'], function ($router) {
    Route::get('/', [ItemsController::class, 'index']);
    Route::post('create', [ItemsController::class, 'create']);
    Route::put('update/{id}', [ItemsController::class, 'update']);
    Route::delete('delete/{id}', [ItemsController::class, 'delete']);
});

Route::group(['prefix' => 'tax'], function ($router) {
    Route::get('/', [PajakController::class, 'index']);
    Route::post('create', [PajakController::class, 'create']);
    Route::put('update/{id}', [PajakController::class, 'update']);
    Route::delete('delete/{id}', [PajakController::class, 'delete']);
});
