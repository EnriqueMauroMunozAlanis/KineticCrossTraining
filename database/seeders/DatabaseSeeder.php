<?php

namespace Database\Seeders;

use App\Models\Clase;
use App\Models\Entrenador;
use App\Models\Horario;
use App\Models\MensajeContacto;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Totales finales tras ejecutar `php artisan migrate:fresh --seed`:
     *  users: 11 (10 Faker + 1 admin) | planes: 6 (2 fijos + 4 Faker)
     *  entrenadores: 10 (1 fijo + 9 Faker) | clases: 8 (2 fijas + 6 Faker)
     *  horarios: 30 (2 fijos + 28 Faker) | mensajes_contacto: 50 Faker
     */
    public function run(): void
    {
        // Usuario administrador del gimnasio
        User::factory()->create([
            'name' => 'Admin Kinetic',
            'email' => 'admin@kinetic.test',
        ]);

        // Usuarios de prueba con Faker
        User::factory(10)->create();

        // Datos base fijos del negocio
        $this->call(GimnasioSeeder::class);

        // Volumen generado con Faker (usa factories de cada modelo)
        Plan::factory(4)->create();
        Entrenador::factory(9)->create();
        Clase::factory(6)->create();
        Horario::factory(28)->create();
        MensajeContacto::factory(50)->create();
    }
}
