<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;
use App\Http\Middleware\EnsurePostMethod;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\EstudiantesController;

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::view('/', 'index');

//materia
Route::get('/materias', [MateriasController::class, 'index']);

//notas
Route::get('/notas/create', [NotasController::class, 'create']);
Route::post('/notas/import', [NotasController::class, 'import']);
Route::get('/materias/notas/{materia}', [NotasController::class, 'notasDeMateria']);
Route::get('/estudiantes/notas/{estudiante}', [NotasController::class, 'notasDeEstudiante']);

//estudiantes
Route::get('/estudiantes', [EstudiantesController::class, 'index']);



