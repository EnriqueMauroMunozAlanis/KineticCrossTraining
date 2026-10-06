<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clases';

    protected $fillable = ['nombre', 'descripcion', 'nivel', 'imagen'];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }
}