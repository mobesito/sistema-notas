<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(){
        $estudiantes = Estudiante::withCount('notas')->get();
        return view('estudiantes.index', [
            'estudiantes' => $estudiantes
        ]);
    }

    public function estudiantesAgregar(){
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

    public function estudiantesEditar(Estudiante $estudiante){
        if(request()->isMethod('GET')){
            if(!$estudiante)abort(404);
            return view('estudiantes.editar', ['estudiante' => $estudiante]);
        }else if(request()->isMethod('POST')){
            $estudiante->nombre = request('nombre');
            $estudiante->apellido = request('apellido');
            if($estudiante->save()){
                $response = ['estado' => 'exito', 'mensaje' => 'Estudiante editado con éxito!'];
            }else{
                $response = ['estado' => 'error', 'mensaje' => 'Ocurrió un error editando el estudiante'];
            }
            return response()->json($response);
        }
    }

    public function estudiantesEliminar(Estudiante $estudiante){
        if(!$estudiante)abort(404);
        if($estudiante->delete()){
            $response = ['estado'=> 'exito','mensaje'=> 'Estudiante eliminado con éxito'];
        }else{
            $response = ['estado'=> 'error', 'mensaje'=> 'Ocurrió un problema eliminando el estudiante'];
        }
        return response()->json($response);
    }
}
