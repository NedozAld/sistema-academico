<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas tipo API para tu aplicación. Estas rutas
| se cargan automáticamente mediante RouteServiceProvider y utilizan
| el grupo de middleware "api".
|
*/

// Ruta para obtener datos del usuario autenticado (ej. desde frontend Vue/React)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta pública (o puedes protegerla con middleware si lo deseas) para obtener asignaturas
Route::get('/asignaturas/{idtit}/{idniv}', [AsignaturaController::class, 'porCarreraYNivel']);
