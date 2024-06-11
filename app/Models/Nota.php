<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function estudiante() {
        return $this->belongsTo(Estudiante::class);
    }

    public function materia(){
        return $this->belongsTo(Materia::class);
    }

}
