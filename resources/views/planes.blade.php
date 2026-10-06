@extends('layouts.app')

@section('titulo', 'Planes')

@section('contenido')
    <h1>Planes y precios</h1>

    @foreach ($planes as $plan)
        <div>
            <h2>{{ $plan->nombre }}</h2>
            <p>${{ $plan->precio }} / {{ $plan->duracion }}</p>
            <p>{{ $plan->beneficios }}</p>
        </div>
    @endforeach
@endsection