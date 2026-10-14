<?php

namespace Database\Factories;

use App\Models\Clase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Clase>
 */
class ClaseFactory extends Factory
{
    protected $model = Clase::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement([
                'HIIT',
                'Boxeo Fitness',
                'Yoga para Atletas',
                'Movilidad y Recovery',
                'Halterofilia',
                'Cardio Burn',
                'Fuerza Total',
                'Gimnasia Deportiva',
            ]),
            'descripcion' => fake()->paragraph(2),
            'nivel' => fake()->randomElement([
                'Principiante',
                'Intermedio',
                'Avanzado',
                'Todos los niveles',
            ]),
            'imagen' => null,
        ];
    }
}
