<?php

use App\Http\Controllers\Api\BusController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware(['auth:api'])->group(function () {
    Route::get('/test', function () {
        return response()->json(['status' => 'success'], 200);
    });

    Route::get('/auth/logout', [UserController::class, 'logout']);

    Route::apiResource('/buses', BusController::class);
    Route::apiResource('/drivers', DriverController::class);
    Route::apiResource('/orders', OrderController::class);
});

Route::post('/auth/login', [UserController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
});


// Route::post('/post'){

// }
