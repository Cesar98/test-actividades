<?php

/* use App\Http\Controllers\Api\ActividadApiController;
use App\Http\Controllers\Api\ReservacionApiController; */

use App\Http\Controllers\Api\ActividadesController;
use App\Http\Controllers\Api\ReservacionesController;
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

Route::get('/actividades', [ActividadesController::class, 'actividades'] );
Route::get('/actividad/detalle', [ActividadesController::class, 'detalle'] );
Route::get('/reservaciones', [ReservacionesController::class, 'reservaciones'] );
Route::get('/reservar', [ReservacionesController::class, 'reservar'] );
Route::get('/reservaciones/cancelar', [ReservacionesController::class, 'cancelar'] );


