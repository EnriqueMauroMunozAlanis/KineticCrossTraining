<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    protected $table = 'entrenadores';

    protected $fillable = ['nombre', 'especialidad', 'biografia', 'foto'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}
