<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;
use App\Http\Middleware\EnsurePostMethod;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\Index;

Route::get('/', [Index::class, 'index']);

//materia
Route::get('/materias', [MateriasController::class, 'index']);

//notas
Route::get('/notas/create', [NotasController::class, 'create']);
Route::post('/notas/import', [NotasController::class, 'import'])->name('NotasImport');
Route::get('/materias/notas/{materia}', [NotasController::class, 'notasDeMateria']);
Route::get('/estudiantes/notas/{estudiante}', [NotasController::class, 'notasDeEstudiante']);

//estudiantes
Route::get('/estudiantes', [EstudiantesController::class, 'index'])->name('listarEstudiantes');
Route::match(['GET', 'POST'], 'estudiantes/agregar', [EstudiantesController::class, 'estudiantasAgregar'])->name('estudiantasAgregar');



