<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Entrenador;
use App\Models\Plan;

class PaginaController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function nosotros()
    {
        return view('nosotros', ['entrenadores' => Entrenador::all()]);
    }

    public function clases()
    {
        return view('clases', ['clases' => Clase::with('horarios')->get()]);
    }

    public function planes()
    {
        return view('planes', ['planes' => Plan::all()]);
    }

    public function contacto()
    {
        return view('contacto');
    }
}