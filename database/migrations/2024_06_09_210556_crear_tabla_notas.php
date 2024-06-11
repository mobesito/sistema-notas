<?php

use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $tabla) {
            $tabla->id();
            $tabla->foreignIdFor(Estudiante::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $tabla->foreignIdFor(Materia::class)->constrained()->cascadeOnDelete()->cascadeOnDelete();
            $tabla->decimal('nota_1', 5, 2)->nullable();
            $tabla->decimal('nota_2', 5, 2)->nullable();
            $tabla->decimal('nota_3', 5, 2)->nullable();
            $tabla->decimal('nota_4', 5, 2)->nullable();
            $tabla->decimal('nota_5', 5, 2)->nullable();
            $tabla->decimal('nota_6', 5, 2)->nullable();
            $tabla->decimal('nota_7', 5, 2)->nullable();
            $tabla->decimal('nota_8', 5, 2)->nullable();
            $tabla->decimal('nota_9', 5, 2)->nullable();
            $tabla->decimal('nota_10', 5, 2)->nullable();
            $tabla->decimal('nota_final', 5, 2)->nullable();
            $tabla->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
