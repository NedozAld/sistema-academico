<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\TitulacionController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ProfesorController;
use App\Models\Asignatura;

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
    Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
    Route::get('/areas/{id}/edit', [AreaController::class, 'edit'])->name('areas.edit');
    Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
    Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
    Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

    // --- Matrículas ---
    // --- Matrículas ---

    //Route::get('/matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
    //Route::get('/matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
    //Route::post('/matriculas', [MatriculaController::class, 'store'])->name('admin.matriculas.store');
    //Route::post('/matriculas', [MatriculaController::class, 'store'])->name('admin.matriculas.store');
    Route::resource('matriculas', MatriculaController::class)->except(['show'])->names('matriculas');

    // --- Titulaciones ---
    Route::resource('titulaciones', TitulacionController::class)->except(['show'])->names('titulaciones');

    // --- Niveles ---
    Route::resource('niveles', NivelController::class)->except(['show'])->names('niveles');

    // --- Periodos ---
    Route::resource('periodos', PeriodoController::class)->except(['show'])->names('periodos');

    // --- Asignaturas ---
    Route::resource('asignaturas', AsignaturaController::class)->except(['show'])->names('asignaturas');

    // --- Profesores ---
    Route::resource('profesores', ProfesorController::class)->except(['show'])->names('profesores');
    Route::get('/profesores/create', [ProfesorController::class, 'create'])->name('profesores.create');
});

Route::get('/asignaturas/{idtit}/{idniv}', function ($idtit, $idniv) {
    return Asignatura::where('idtit', $idtit)
        ->where('idniv', $idniv)
        ->get(['idasi', 'nombreasi']);
});
// Rutas para estudiantes
// ======================= ESTUDIANTE ===========================
Route::middleware(['auth', 'rol:estudiante'])->prefix('estudiante')->name('estudiante.')->group(function () {
    Route::get('/inicio', [EstudianteController::class, 'index'])->name('inicio');
    Route::get('/perfil', [EstudianteController::class, 'perfil'])->name('perfil');
    Route::get('/matricula', [EstudianteController::class, 'matriculaForm'])->name('matricula.form');
    Route::post('/matricula', [EstudianteController::class, 'registrarMatricula'])->name('matricula.registrar');

    Route::get('/materias', [EstudianteController::class, 'verMaterias'])->name('materias');
    Route::get('/horario', [EstudianteController::class, 'miHorario'])->name('horario');
    Route::get('/tutorias', [EstudianteController::class, 'tutorias'])->name('tutorias');
});




Route::middleware(['auth', 'rol:profesor'])->prefix('profesor')->name('profesor.')->group(function () {
    Route::get('/inicio', [ProfesorController::class, 'inicio'])->name('inicio');
    // Futuras rutas: horario, tutorías, etc.
    // Route::get('/horario', [...])->name('horario');
    // Route::get('/tutorias', [...])->name('tutorias');
});

// ======================= API AUXILIAR PARA MATRÍCULA ===========================
Route::get('/asignaturas/{idtit}/{idniv}', [AsignaturaController::class, 'porCarreraYNivel']);


// Dashboard Laravel Breeze
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
