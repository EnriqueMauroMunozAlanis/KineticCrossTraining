<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo') | KineticCrossTraining</title>
</head>
<body>
    <nav>
        <a href="{{ route('inicio') }}">Inicio</a> |
        <a href="{{ route('nosotros') }}">Nosotros</a> |
        <a href="{{ route('clases') }}">Clases</a> |
        <a href="{{ route('planes') }}">Planes</a> |
        <a href="{{ route('contacto') }}">Contacto</a>
    </nav>

    <main>@yield('contenido')</main>

    <footer>© {{ date('Y') }} KineticCrossTraining</footer>
</body>
</html>