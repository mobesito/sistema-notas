<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\Index;
use App\Http\Controllers\LoginController;

//login
Route::match(['GET','POST'],'/login', [LoginController::class,'login'])->middleware('guest')->name('login');

Route::middleware('auth')->group(function () {
    //logout
    Route::post('/logout', [LoginController::class,'logout'])->name('logout');

    Route::get('/', [Index::class, 'index']);
    //materia
    Route::get('/materias', [MateriasController::class, 'index'])->name('listarMaterias');
    Route::match(['GET','POST'],'/materias/agregar', [MateriasController::class,'materiasAgregar'])->name('materiasAgregar');
    Route::match(['GET','POST'],'/materias/editar/{materia}', [MateriasController::class,'materiasEditar'])->name('materiasEditar');
    Route::delete('/materias/eliminar/{materia}', [MateriasController::class,'materiasEliminar'])->name('materiasEliminar');

    //notas
    Route::get('/notas/create', [NotasController::class, 'create']);
    Route::post('/notas/import', [NotasController::class, 'import'])->name('NotasImport');
    Route::get('/materias/notas/{materia}', [NotasController::class, 'notasDeMateria']);
    Route::get('/estudiantes/notas/{estudiante}', [NotasController::class, 'notasDeEstudiante']);

    //estudiantes
    Route::get('/estudiantes', [EstudiantesController::class, 'index'])->name('listarEstudiantes');
    Route::match(['GET', 'POST'], 'estudiantes/agregar', [EstudiantesController::class, 'estudiantesAgregar'])->name('estudiantesAgregar');
    Route::match(['GET', 'POST'], '/estudiantes/editar/{estudiante}', [EstudiantesController::class,'estudiantesEditar'])->name('estudiantesEditar');
    Route::delete('/estudiantes/eliminar/{estudiante}', [EstudiantesController::class,'estudiantesEliminar'])->name('estudiantesEliminar');

    //reportes pdf
    Route::get('/estudiantes/notas/{estudiante}/pdf', [NotasController::class, 'notasDeEstudiantePDF'])->name('notasDeEstudiantePDF');
    Route::get('/materias/notas/{materia}/pdf', [NotasController::class, 'notasDeMateriaPDF'])->name('notasDeMateriaPDF');
});


