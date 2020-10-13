<?php

use App\Http\Controllers\Api\Clientes\ClienteController;
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

Route::name("v1.")->middleware('auth:sanctum')->group(function(){
    Route::get('/cliente/{documento}',[ClienteController::class, 'cliente'] )->name('clientepordocumento');
    Route::get('/cliente-email/{email}',[ClienteController::class, 'clientePorEmail'] )->name('clienteporemail');
    Route::get('/cliente-telefono/{telefono}',[ClienteController::class, 'clientePorTelefono'] )->name('clienteportelefono');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
