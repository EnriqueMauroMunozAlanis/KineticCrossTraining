<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = ['clase_id', 'entrenador_id', 'dia_semana', 'hora_inicio', 'hora_fin'];

    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class);
    }
}
