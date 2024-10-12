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

    public function estudiantasAgregar(){
        if(request()->isMethod('GET')){
            return view('estudiantes.agregar');
        }else if(request()->isMethod('POST')){
            $estudiante = new Estudiante();
            $estudiante->nombre = request('nombre');
            $estudiante->apellido = request('apellido');
            if($estudiante->save()){
                $response = ['estado' => 'exito', 'mensaje' => 'Estudiante agregado con éxito!'];
            }else{
                $response = ['estado' => 'error', 'mensaje' => 'Ocurrió un error agregando el estudiante'];
            }

            return response()->json($response);
        }
    }
}
