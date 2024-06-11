<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Nota;
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
        $response = '';

        $import = new NotasImport();
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $file = $request->file('file');
        Excel::import($import, $file);

        $processedRecords = $import->getProcessedRecords();
        $existingRecords = Nota::all()->pluck('id')->toArray();

        $recordsToDelete = array_diff($existingRecords, $processedRecords);

        if (!empty($recordsToDelete)) {
            Nota::destroy($recordsToDelete);
            $response = 'registro/s borrado/s';
            return view('index', [
                'response' => $response
            ]);
        }

        $updatedRecords = $import->getUpdatedRecords();
        $createdRecords = $import->getCreatedRecords();

        if($updatedRecords){
            $response = 'registro/s actualizado/s';
            return view('index', [
                'response' => $response
            ]);
        }elseif($createdRecords){
            $response = 'registro/s creado/s';
            return view('index', [
                'response' => $response
            ]);
        }else{
            $response = 'El archivo no tenía cambios con respecto a la base de datos...';
            return view('index', [
                'response' => $response
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

}
