<!doctype html>
<html>
<head>
    <title>FutbolApp - Inicio</title>
</head>
<body>
    <h1>Bienvenido a FutbolApp</h1>
    <p>Una aplicación para gestionar partidos y equipos de fútbol amateur.</p>

    <nav>
        <a href="{{ route('partidos.create') }}">Registrar Partido</a> |
        <a href="{{ route('partidos.index') }}">Ver Partidos Registrados</a>
    </nav>
</body>
</html>