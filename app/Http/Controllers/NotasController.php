<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Materia;
use App\Models\Estudiante;
use App\Imports\NotasImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class NotasController extends Controller
{

    public function create(){
        return view('notas.subir-nota');
    }

    public function import(Request $request)
    {
        /* definimos arreglo con los headers necesarios para los archivos excel a importar */
        $requiredCols = ["codigo_estudiante", "nombre", "apellido", "id_materia", "nota_1", "nota_2",	"nota_3", "nota_4", "nota_5", "nota_6",	"nota_7", "nota_8",	"nota_9", "nota_10", "nota_final"];

        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $import = new NotasImport();
        $file = $request->file('file');
        $headings = (new HeadingRowImport)->toArray($file);
        /* chequeamos si existe diferencia de headers entre archivo subido y los headers requeridos*/
        if(array_diff($requiredCols, $headings[0][0]))
        {
            $response = ['estado' => 'error', 'mensaje' => 'Por favor utiliza la plantilla de Excel brindada'];
            return response()->json($response);
        }
        else
        {
            Excel::import($import, $file);
        }

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

        if($invalidRecords)
        {
            $response = ['estado' => 'error', 'mensaje' => 'Estudiante o materia no encontrada'];
            return response()->json($response);
        }
        if($updatedRecords)
        {
            $response = ['estado' => 'exito', 'mensaje' => 'registro/s actualizado/s con éxito'];
            return response()->json($response);
        }
        elseif($createdRecords)
        {
            $response = ['estado' => 'exito', 'mensaje' => 'registro/s creado/s'];
            return response()->json($response);
        }
        else
        {
            $response = ['estado' => 'null', 'mensaje' => 'El archivo no tenía cambios con respecto a la base de datos...'];
            return response()->json($response);
        }
    }

    public function notasDeMateria(Materia $materia){
        if(!$materia) abort('404');
        $notasdeMateria = Nota::with('estudiante')->where('materia_id', $materia->id)->get();
        return view('notas.nota-por-materia', ['notasDeMateria' => $notasdeMateria, 'materia' => $materia]);
    }

    public function notasDeMateriaPDF(Materia $materia){
        if(!$materia) abort('404');
        $notasDeMateria = Nota::with('estudiante')->where('materia_id', $materia->id)->get();
        $pdf = Pdf::loadView('pdf.notas-materia', compact('notasDeMateria', 'materia'));
        return $pdf->stream();
    }

    public function notasDeEstudiante(Estudiante $estudiante)
    {
        if(!$estudiante) abort('404');
        $notasDeEstudiante = Nota::with('materia')->where('estudiante_id', $estudiante->id)->get();
        return view('notas.nota-por-estudiante', ['notasDeEstudiante' => $notasDeEstudiante, 'estudiante' => $estudiante]);
    }

    public function notasDeEstudiantePDF(Estudiante $estudiante)
    {
        if(!$estudiante) abort('404');
        $notasDeEstudiante = Nota::with('materia')->where('estudiante_id', $estudiante->id)->get();
        $pdf = Pdf::loadView('pdf.notas-estudiante', compact('notasDeEstudiante', 'estudiante'));
        return $pdf->stream();
    }

}
