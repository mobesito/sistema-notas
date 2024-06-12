<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(){
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', [
            'estudiantes' => $estudiantes
        ]);
    }
}
