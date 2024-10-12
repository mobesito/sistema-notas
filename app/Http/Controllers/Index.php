<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Http\Request;

class Index extends Controller
{
    function index(){
        $total_estudiantes = count(Estudiante::get()->all());
        $total_materias = count(Materia::get()->all());
        return view('index', ['total_estudiantes' => $total_estudiantes, 'total_materias' => $total_materias]);
    }
}
