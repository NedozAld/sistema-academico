<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AreaController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Panel del administrador
Route::middleware(['auth', 'rol:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Panel de administrador
    Route::get('/panel', [AdminController::class, 'index'])->name('panel');

    // --- Departamentos ---
    Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
    Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');
    Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
    Route::get('/departamentos/{id}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');
    Route::put('/departamentos/{id}', [DepartamentoController::class, 'update'])->name('departamentos.update');
    Route::delete('/departamentos/{id}', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

    // --- Áreas ---
    Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');

    Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create'); // ✅ AÑADIDA
    Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');   // ✅ AÑADIDA
    Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
    Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
    Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');
});

// Rutas para estudiantes
Route::middleware(['auth', 'rol:estudiante'])->prefix('estudiante')->name('estudiante.')->group(function () {
    Route::get('/inicio', [EstudianteController::class, 'index'])->name('inicio');
    Route::get('/perfil', [EstudianteController::class, 'perfil'])->name('perfil');

    // Futuras rutas: matrícula, horario, tutorías, etc.
    // Route::get('/matricula', [...])->name('matricula');
    // Route::get('/horario', [...])->name('horario');
    // Route::get('/tutorias', [...])->name('tutorias');
});

// Dashboard Laravel Breeze (opcional)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil del usuario autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación Breeze
require __DIR__ . '/auth.php';
