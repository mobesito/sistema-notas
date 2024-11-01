<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index(){
        $materias = Materia::withCount('notas')->get();
        return view('materias.index', [
            'materias' => $materias
        ]);
    }

    public function materiasAgregar(){
        if(request()->isMethod('GET')){
            return view('materias.agregar');
        }else if(request()->isMethod('POST')){
            $materia = new Materia();
            $materia->nombre_materia = request()->get('nombre');
            if($materia->save()){
                $reponse = ['estado' => 'exito', 'mensaje' => 'Materia agregada con éxito'];
            }else{
                $reponse = ['estado' => 'error', 'mensaje' => 'Ocurrió un problema agregando la materia'];
            }
            return response()->json($reponse);
        }
    }

    public function materiasEditar(Materia $materia){
        if(request()->isMethod('GET')){
            return view('materias.editar', ['materia' => $materia]);
        }else if(request()->isMethod('POST')){
            $materia->nombre_materia = request()->get('nombre');
            if($materia->save()){
                $reponse = ['estado'=> 'exito', 'mensaje' => 'materia editada exitosamente' ];
            }else{
                $reponse = ['estado'=> 'error', 'mensaje' => 'Ocur un problema editando esta materia' ];
            }
            return response()->json($reponse);
        }
    }

    public function materiasEliminar(Materia $materia){
        if(!$materia)abort(404);
        if($materia->delete()){
            $reponse = ['estado'=> 'exito', 'mensaje' => 'Materia eliminada con éxito'];
        }else{
            $reponse = ['estado'=> 'error', 'mensaje' => 'Ocurrió un problema eliminando la materia'];
        }
        return response()->json($reponse);
    }
}
