<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index(){
        $materias = Materia::all();
        return view('materias.index', [
            'materias' => $materias
        ]);
    }
}
