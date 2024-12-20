<?php

namespace App\Imports;

use App\Models\Nota;
use App\Models\Materia;
use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

// $exists = Nota::all()->where('estudiante_id', $row['codigo_estudiante'])->where('materia_id', $row['id_materia']);
class NotasImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $registrosActualizados = [];
    protected $registrosCreados = [];

    protected $registrosProcesados = [];

    protected $registrosBorrados = [];

    protected $registrosInvalidos = [];

    public function model(array $row)
    {

        if($this->validateForeignKeys($row) == false){
            $this->registrosInvalidos[] = $row;
            return null;
        }

        //verificamos duplicados
        $existingNota = $this->getIfExistsOnDb($row);


        if ($existingNota)// Si hay duplicado lo actualizamos
        {
            $data = $this->getExcelRecords($row);

            if ($existingNota->only(array_keys($data)) != $data)
            {
                // actualizar datos si los registros fueron modificados
                $existingNota->update($data);
                $this->registrosActualizados[] = $existingNota->id;
            }
            $this->registrosProcesados[] = $existingNota->id;
            return null;
        }
            else //si no hay duplicados retornamos objeto a insertar
        {
            $nota = new Nota($this->createNota($row));
            $nota->save();
            $this->registrosCreados[] = $nota->id;
            $this->registrosProcesados[] = $nota->id;
            return $nota;
        }

    }


    public function validateForeignKeys(array $row)
    {
        $estudianteExists = Estudiante::find($row['codigo_estudiante']);
        $materiaExists = Materia::find($row['id_materia']);
        return $estudianteExists && $materiaExists;
    }


    public function getIfExistsOnDb(array $row){
        return Nota::where('estudiante_id', $row['codigo_estudiante'])
        ->where('materia_id', $row['id_materia'])
        ->first();
    }


    public function createNota(array $row){
        $todasLasNotas = true;
        $notaFinal = 0;
        foreach (range(1, 10) as $i) {
            $notaFinal += $row['nota_'.$i];
            if (!isset($row['nota_'.$i]) || $row['nota_'.$i] === null) {
                $todasLasNotas = false;
                break;
            }
        }
        $notaFinal = $notaFinal / 10;
        return [
            'estudiante_id' => $row['codigo_estudiante'],
            'materia_id' => $row['id_materia'],
            'nota_1' => $row['nota_1'],
            'nota_2' => $row['nota_2'],
            'nota_3' => $row['nota_3'],
            'nota_4' => $row['nota_4'],
            'nota_5' => $row['nota_5'],
            'nota_6' => $row['nota_6'],
            'nota_7' => $row['nota_7'],
            'nota_8' => $row['nota_8'],
            'nota_9' => $row['nota_9'],
            'nota_10' => $row['nota_10'],
            'nota_final' => $todasLasNotas ? $notaFinal : $row['nota_final']
        ];
    }


    public function getExcelRecords(array $row){
        $todasLasNotas = true;
        $notaFinal = 0;
        foreach (range(1, 10) as $i) {
            $notaFinal += $row['nota_'.$i];
            if (!isset($row['nota_'.$i]) || $row['nota_'.$i] === null) {
                $todasLasNotas = false;
                break;
            }
        }
        $notaFinal = $notaFinal / 10;
        return [
            'nota_1' => $row['nota_1'],
            'nota_2' => $row['nota_2'],
            'nota_3' => $row['nota_3'],
            'nota_4' => $row['nota_4'],
            'nota_5' => $row['nota_5'],
            'nota_6' => $row['nota_6'],
            'nota_7' => $row['nota_7'],
            'nota_8' => $row['nota_8'],
            'nota_9' => $row['nota_9'],
            'nota_10' => $row['nota_10'],
            'nota_final' => $todasLasNotas ? $notaFinal : $row['nota_final']
        ];
    }

    public function getDbRecords(){
        return Nota::all()->pluck(['id', 'estudiante_id', 'materia_id'])->toArray();
    }
    // obtiene registros actualizados
    public function getUpdatedRecords()
    {
        return $this->registrosActualizados;
    }

    // obtiene registros creados
    public function getCreatedRecords()
    {
        return $this->registrosCreados;
    }

    public function getDeletedRecords()
    {
        return $this->registrosBorrados;
    }

    public function getProcessedRecords()
    {
        return $this->registrosProcesados;
    }

    public function getInvalidRecords()
    {
        return $this->registrosInvalidos;
    }

}
