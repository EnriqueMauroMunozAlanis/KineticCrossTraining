<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plan>
 */
class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->unique()->randomElement([
                'Intermedio',
                'Anual Pro',
                'Estudiantil',
                'Parejas',
                'Familiar',
                'Drop-In',
            ]),
            'precio' => fake()->randomElement([350, 500, 650, 800, 1200, 2100, 8500]),
            'duracion' => fake()->randomElement([
                'Mensual', 'Trimestral', 'Semestral', 'Anual', 'Por clase',
            ]),
            'beneficios' => fake()->paragraph(2),
        ];
    }
}
