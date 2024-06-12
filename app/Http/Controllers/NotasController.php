<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Materia;
use App\Models\Estudiante;
use App\Imports\NotasImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NotasController extends Controller
{


    public function create(){
        return view('notas.subir-nota');
    }

    public function import(Request $request)
    {

        $import = new NotasImport();
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');
        Excel::import($import, $file);

        //DELETE PROCESS, CURRENTLY DISABLED
       /*  $processedRecords = $import->getProcessedRecords();
        $existingRecords = Nota::all()->pluck('id')->toArray();

        $recordsToDelete = array_diff($existingRecords, $processedRecords);

        if (!empty($recordsToDelete)) {
            Nota::destroy($recordsToDelete);
            $response = 'registro/s borrado/s';
            return view('index', [
                'response' => $response
            ]);
        } */
        $invalidRecords = $import->getInvalidRecords();
        $updatedRecords = $import->getUpdatedRecords();
        $createdRecords = $import->getCreatedRecords();


        if($invalidRecords){
            $error_message = 'estudiante o materia no encontrada';
            return view('index', [
                'error_message' => $error_message,
                /* 'error' => $invalidRecords */
            ]);
        }
        if($updatedRecords){
            $success = 'registro/s actualizado/s';
            return view('index', [
                'success' => $success
            ]);
        }elseif($createdRecords){
            $success = 'registro/s creado/s';
            return view('index', [
                'success' => $success
            ]);
        }else{
            $info_message = 'El archivo no tenía cambios con respecto a la base de datos...';
            return view('index', [
                'info_message' => $info_message
            ]);
        }

    }


    public function notasDeMateria(Materia $materia){
        if(!$materia) abort('404');
        $notasdeMateria = Nota::with('estudiante')->where('materia_id', $materia->id)->get();
        return view('notas.nota-por-materia', [
            'notasDeMateria' => $notasdeMateria,
            'materia' => $materia
        ]);
    }

    public function notasDeEstudiante(Estudiante $estudiante)
    {
       // dd($estudiante);
        if(!$estudiante) abort('404');
        $notasDeEstudiante = Nota::with('materia')->where('estudiante_id', $estudiante->id)->get();
        return view('notas.nota-por-estudiante', [
            'notasDeEstudiante' => $notasDeEstudiante,
            'estudiante' => $estudiante
        ]);
    }

}
