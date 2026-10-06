@extends('layouts.app')

@section('titulo', 'Clases')

@section('contenido')
    <h1>Nuestras clases</h1>

    @foreach ($clases as $clase)
        <div>
            <h2>{{ $clase->nombre }}</h2>
            <p>{{ $clase->descripcion }}</p>
            <p>Nivel: {{ $clase->nivel }}</p>

            @foreach ($clase->horarios as $horario)
                <p>{{ $horario->dia_semana }}: {{ $horario->hora_inicio }} - {{ $horario->hora_fin }}</p>
            @endforeach
        </div>
    @endforeach
@endsection