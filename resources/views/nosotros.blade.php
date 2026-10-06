@extends('layouts.app')

@section('titulo', 'Nosotros')

@section('contenido')
    <h1>Sobre nosotros</h1>
    <p>KineticCrossTraining es un gimnasio dedicado al entrenamiento funcional y CrossFit.</p>

    <h2>Nuestros entrenadores</h2>
    @foreach ($entrenadores as $entrenador)
        <div>
            <h3>{{ $entrenador->nombre }}</h3>
            <p>{{ $entrenador->especialidad }}</p>
            <p>{{ $entrenador->biografia }}</p>
        </div>
    @endforeach
@endsection