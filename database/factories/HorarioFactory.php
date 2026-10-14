<?php

namespace Database\Factories;

use App\Models\Clase;
use App\Models\Entrenador;
use App\Models\Horario;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Horario>
 */
class HorarioFactory extends Factory
{
    protected $model = Horario::class;

    public function definition(): array
    {
        $inicio = fake()->randomElement([
            '06:00', '07:00', '08:00', '09:00',
            '10:00', '17:00', '18:00', '19:00', '20:00',
        ]);

        return [
            'clase_id' => Clase::inRandomOrder()->value('id') ?? Clase::factory(),
            'entrenador_id' => Entrenador::inRandomOrder()->value('id') ?? Entrenador::factory(),
            'dia_semana' => fake()->randomElement([
                'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado',
            ]),
            'hora_inicio' => $inicio,
            'hora_fin' => Carbon::createFromFormat('H:i', $inicio)->addHour()->format('H:i:s'),
        ];
    }
}
