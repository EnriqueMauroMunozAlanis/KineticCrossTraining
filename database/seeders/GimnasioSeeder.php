<?php

namespace Database\Seeders;

use App\Models\Clase;
use App\Models\Entrenador;
use App\Models\Horario;
use App\Models\Plan;
use Illuminate\Database\Seeder;

class GimnasioSeeder extends Seeder
{
    public function run(): void
    {
        // Planes
        Plan::create([
            'nombre' => 'Básico',
            'precio' => 500,
            'duracion' => 'Mensual',
            'beneficios' => 'Acceso a clases grupales en horario regular',
        ]);

        Plan::create([
            'nombre' => 'Premium',
            'precio' => 800,
            'duracion' => 'Mensual',
            'beneficios' => 'Acceso ilimitado a todas las clases y asesoría nutricional',
        ]);

        // Entrenadores
        $entrenador = Entrenador::create([
            'nombre' => 'Carlos Ramírez',
            'especialidad' => 'CrossFit',
            'biografia' => 'Entrenador certificado con 5 años de experiencia.',
        ]);

        // Clases
        $crossfit = Clase::create([
            'nombre' => 'CrossFit',
            'descripcion' => 'Entrenamiento de alta intensidad con movimientos funcionales.',
            'nivel' => 'Todos los niveles',
        ]);

        $funcional = Clase::create([
            'nombre' => 'Entrenamiento Funcional',
            'descripcion' => 'Ejercicios que mejoran fuerza, movilidad y resistencia en la vida diaria.',
            'nivel' => 'Principiante',
        ]);

        // Horarios
        Horario::create([
            'clase_id' => $crossfit->id,
            'entrenador_id' => $entrenador->id,
            'dia_semana' => 'Lunes',
            'hora_inicio' => '07:00',
            'hora_fin' => '08:00',
        ]);

        Horario::create([
            'clase_id' => $funcional->id,
            'entrenador_id' => $entrenador->id,
            'dia_semana' => 'Miércoles',
            'hora_inicio' => '18:00',
            'hora_fin' => '19:00',
        ]);
    }
}
