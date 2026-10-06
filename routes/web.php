<?php

use App\Http\Controllers\PaginaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaginaController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('nosotros');
Route::get('/clases', [PaginaController::class, 'clases'])->name('clases');
Route::get('/planes', [PaginaController::class, 'planes'])->name('planes');
Route::get('/contacto', [PaginaController::class, 'contacto'])->name('contacto');