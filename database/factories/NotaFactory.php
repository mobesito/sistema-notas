<?php

namespace Database\Factories;

use App\Models\Estudiante;
use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $notas = [
            'nota_1' => fake()->randomFloat(1, 0, 10),
            'nota_2' => fake()->randomFloat(1, 0, 10),
            'nota_3' => fake()->randomFloat(1, 0, 10),
            'nota_4' => fake()->randomFloat(1, 0, 10),
            'nota_5' => fake()->randomFloat(1, 0, 10),
            'nota_6' => fake()->randomFloat(1, 0, 10),
            'nota_7' => fake()->randomFloat(1, 0, 10),
            'nota_8' => fake()->randomFloat(1, 0, 10),
            'nota_9' => fake()->randomFloat(1, 0, 10),
            'nota_10' => fake()->randomFloat(1, 0, 10),
        ];

        return [
            'estudiante_id' => Estudiante::factory(),
            'materia_id' => Materia::factory(),
            'nota_1' => $notas['nota_1'],
            'nota_2' => $notas['nota_2'],
            'nota_3' => $notas['nota_3'],
            'nota_4' => $notas['nota_4'],
            'nota_5' => $notas['nota_5'],
            'nota_6' => $notas['nota_6'],
            'nota_7' => $notas['nota_7'],
            'nota_8' => $notas['nota_8'],
            'nota_9' => $notas['nota_9'],
            'nota_10' => $notas['nota_10'],
            'nota_final' => array_sum($notas) / count($notas),
        ];
    }
}
