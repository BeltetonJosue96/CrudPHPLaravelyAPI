<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAlumnosController;
use App\Http\Controllers\AuthController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/', [ApiAlumnosController::class, 'index']);
    Route::post('/agregar', [ApiAlumnosController::class, 'create']);
    Route::get('/consultar', [ApiAlumnosController::class, 'all']);
    Route::get('/consultar/{id}', [ApiAlumnosController::class, 'getAlumno']);
    Route::put('/editar/{id}', [ApiAlumnosController::class, 'edit']);
    Route::delete('/borrar/{id}', [ApiAlumnosController::class, 'delete']);
});
