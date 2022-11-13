<?php

use App\Http\Controllers\ActividadApiController;
use App\Http\Controllers\ReservacionApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/actividades', [ActividadApiController::class, 'actividades'] );
Route::get('/actividad/detalle', [ActividadApiController::class, 'detalle'] );
Route::get('/reservar', [ReservacionApiController::class, 'reservar'] );

