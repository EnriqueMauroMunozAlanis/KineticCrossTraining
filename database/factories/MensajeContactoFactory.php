<?php

namespace Database\Factories;

use App\Models\MensajeContacto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MensajeContacto>
 */
class MensajeContactoFactory extends Factory
{
    protected $model = MensajeContacto::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'correo' => fake()->unique()->safeEmail(),
            'telefono' => fake()->optional()->phoneNumber(),
            'mensaje' => fake()->randomElement([
                'Quiero información sobre los planes y precios del gimnasio.',
                '¿Cuáles son los horarios de las clases de CrossFit?',
                'Me interesa una clase muestra, ¿cómo puedo agendarla?',
                '¿Tienen promociones para estudiantes o parejas?',
                '¿Qué nivel necesito para empezar en entrenamiento funcional?',
                '¿Cuentan con asesoría nutricional incluida en algún plan?',
            ]),
        ];
    }
}
