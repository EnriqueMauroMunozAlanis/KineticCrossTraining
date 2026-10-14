<?php

namespace Database\Factories;

use App\Models\Entrenador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Entrenador>
 */
class EntrenadorFactory extends Factory
{
    protected $model = Entrenador::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'especialidad' => fake()->randomElement([
                'CrossFit',
                'Entrenamiento Funcional',
                'HIIT',
                'Halterofilia',
                'Yoga para Atletas',
                'Movilidad y Recovery',
                'Boxeo Fitness',
                'Nutrición Deportiva',
            ]),
            'biografia' => fake()->paragraph(3),
            'foto' => null,
        ];
    }
}
