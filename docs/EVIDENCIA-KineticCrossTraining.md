# Evidencia — Base de datos KineticCrossTraining (Laravel: migraciones, factories y seeders)

> Guía para armar el PDF pedido por el profesor. Los comandos ya fueron verificados
> en MySQL (`kinetic_cross_training`) con `php artisan migrate:fresh --seed` sin errores.
> Totales finales: **users 11 · planes 6 · entrenadores 10 · clases 8 · horarios 30 · mensajes_contacto 50**.

## 1. Portada (10%) — completar en el PDF

- Universidad / Carrera: Sistemas Computacionales
- Materia y grupo: [COMPLETAR]
- Profesor: [COMPLETAR]
- Proyecto integrador: **KineticCrossTraining** — sitio web del gimnasio de entrenamiento funcional y CrossFit
- Equipo: [nombres + matrículas]
- Fecha: [COMPLETAR]
- Link del repo: https://github.com/EnriqueMauroMunozAlanis/KineticCrossTraining

Descripción corta (para la portada): KineticCrossTraining opera solo de forma presencial y
depende del boca a boca. El proyecto desarrolla su primera página digital para dar a conocer
servicios (clases, horarios, entrenadores, planes) y ofrecer un canal de contacto, respaldando su expansión.

## 2. Migraciones (25%)

### 2.1 Tablas del proyecto

| Migración | Tabla | Contenido |
|---|---|---|
| `0001_01_01_000000` | `users` | default Laravel (admin + pruebas) |
| `2026_10_06_053749` | `entrenadores` | id, nombre, especialidad, biografia nullable, foto nullable, timestamps |
| `2026_10_06_053758` | `clases` | id, nombre, descripcion, nivel default "Todos los niveles", imagen nullable, timestamps |
| `2026_10_06_053806` | `horarios` | id, `clase_id` FK→clases cascade, `entrenador_id` FK nullable→entrenadores nullOnDelete, dia_semana, hora_inicio, hora_fin, timestamps |
| `2026_10_06_053813` | `planes` | id, nombre, precio decimal(8,2), duracion default "Mensual", beneficios nullable, timestamps |
| `2026_10_06_053820` | `mensajes_contacto` | id, nombre, correo, telefono nullable, mensaje, timestamps |

Código fuente: `database/migrations/*.php` (5 migraciones propias + 3 default).

### 2.2 Capturas que debe llevar el PDF

1. Terminal: `php artisan migrate:status` (antes — muestra `Ran`).
2. Código de cada migración (abrir cada archivo en el editor y capturar).
3. Terminal: `php artisan migrate` ejecutándose exitosamente (o `migrate:fresh --seed`).
4. Gestor BD (phpMyAdmin / HeidiSQL / TablePlus / MySQL Workbench) mostrando las 6 tablas creadas en `kinetic_cross_training`.

Comandos para las capturas:

```powershell
php artisan migrate:status
php artisan migrate
php artisan migrate:fresh --seed
```

Salida esperada (ya verificada):

```text
0001_01_01_000000_create_users_table .. DONE
0001_01_01_000001_create_cache_table .. DONE
0001_01_01_000002_create_jobs_table .. DONE
2026_10_06_053749_create_entrenadors_table .. DONE
2026_10_06_053758_create_clases_table .. DONE
2026_10_06_053806_create_horarios_table .. DONE
2026_10_06_053813_create_plans_table .. DONE
2026_10_06_053820_create_mensaje_contactos_table .. DONE

Database\Seeders\GimnasioSeeder .. DONE
```

## 3. Factories (25%) — 1 por modelo, con Faker

Archivos (capturar el código completo de cada uno):

- `database/factories/UserFactory.php` (default Laravel, ya usa Faker)
- `database/factories/EntrenadorFactory.php` — `nombre` (name), `especialidad` (randomElement de 8 especialidades reales del gym), `biografia` (paragraph), `foto` null
- `database/factories/ClaseFactory.php` — `nombre` (unique randomElement: HIIT, Boxeo Fitness, Yoga para Atletas, Movilidad y Recovery, Halterofilia, Cardio Burn, Fuerza Total, Gimnasia Deportiva), `descripcion` (paragraph), `nivel` (Principiante/Intermedio/Avanzado/Todos los niveles)
- `database/factories/HorarioFactory.php` — `clase_id` y `entrenador_id` aleatorios existentes (fallback a factory), `dia_semana` (Lunes–Sábado), `hora_inicio` de horario real del gym y `hora_fin` = inicio + 1h (Carbon)
- `database/factories/PlanFactory.php` — `nombre` unique (Intermedio, Anual Pro, Estudiantil, Parejas, Familiar, Drop-In), `precio` de lista real, `duracion` (Mensual/Trimestral/Semestral/Anual/Por clase), `beneficios` (paragraph)
- `database/factories/MensajeContactoFactory.php` — `nombre`, `correo` (safeEmail), `telefono` (optional phoneNumber), `mensaje` (6 mensajes típicos de interesados en el gym)

Requisito "usar Faker": todos usan el helper `fake()` (Faker con locale `es_MX` configurado en `.env` como `APP_FAKER_LOCALE=es_MX`).

Modelos con `HasFactory`: `Entrenador`, `Clase`, `Horario`, `Plan`, `MensajeContacto` (ver `app/Models/*.php`).

## 4. Seeders (25%)

- `database/seeders/GimnasioSeeder.php` — datos base fijos del negocio (contenido real en español):
  2 planes (Básico $500, Premium $800) + 1 entrenador (Carlos Ramírez, CrossFit) + 2 clases (CrossFit, Entrenamiento Funcional) + 2 horarios (Lun 07:00, Mié 18:00).
- `database/seeders/DatabaseSeeder.php` — orquestador. Crea 1 admin (`admin@kinetic.test`), 10 users Faker, llama a `GimnasioSeeder` y completa con factories hasta los totales redondos:
  `Plan::factory(4)`, `Entrenador::factory(9)`, `Clase::factory(6)`, `Horario::factory(28)`, `MensajeContacto::factory(50)`.

Capturas: código completo de `DatabaseSeeder.php` + terminal con `php artisan db:seed` sin errores:

```powershell
php artisan db:seed
# salida esperada: Database\Seeders\GimnasioSeeder .. DONE (sin excepciones)
```

## 5. Visualizar datos (10%)

```powershell
php artisan migrate:fresh --seed
php artisan tinker --execute="echo 'users:'.App\Models\User::count().PHP_EOL.'planes:'.App\Models\Plan::count().PHP_EOL.'entrenadores:'.App\Models\Entrenador::count().PHP_EOL.'clases:'.App\Models\Clase::count().PHP_EOL.'horarios:'.App\Models\Horario::count().PHP_EOL.'mensajes:'.App\Models\MensajeContacto::count().PHP_EOL;"
```

Resultado esperado (verificado):

```text
users:11
planes:6
entrenadores:10
clases:8
horarios:30
mensajes:50
```

Capturas: terminal del `migrate:fresh --seed` + 1 captura por tabla en el gestor BD mostrando registros
(users, planes, entrenadores, clases, horarios, mensajes_contacto) donde se vea el conteo.

## 6. GitHub (5%)

```powershell
git add -A
git commit -m "Base de datos KineticCrossTraining: factories con Faker y seeders (migrate:fresh --seed verificado)"
git push origin main
```

Capturas: `git log --oneline` local + página de Commits en GitHub con los cambios.
Repo: https://github.com/EnriqueMauroMunozAlanis/KineticCrossTraining

## 7. Checklist antes de exportar el PDF

- [ ] Portada con todos los datos del equipo
- [ ] 5 capturas de código de migraciones + terminal migrate + tablas en BD
- [ ] Código completo de los 6 factories (5 nuevos + User)
- [ ] Código completo de DatabaseSeeder.php (+ GimnasioSeeder)
- [ ] Terminal `db:seed` y `migrate:fresh --seed` sin errores
- [ ] 6 capturas de tablas con registros + conteos (11/6/10/8/30/50)
- [ ] Captura de commits en GitHub + link del repo
- [ ] Todo en un solo PDF
