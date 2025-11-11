<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutbolApp - Inicio</title>
    <link rel="stylesheet" href="{{ asset('estilo.css') }}">

</head>

<body>
    <header>
        <img src="{{ asset('Gran_Canaria_FS.png') }}" alt="Gran Canaria" class="logo" width="200">
        <h1>Bienvenido a FutbolApp</h1>
        <p>Gestiona partidos y equipos de fútbol amateur en la isla de Gran Canaria ⚽🌴</p>
    </header>

    <nav>
        <a href="{{ route('partidos.create') }}">Registrar Partido</a>
        <a href="{{ route('partidos.index') }}">Ver Partidos</a>
    </nav>

    <main>
        <section>
            <h2>⚽ Tu centro del fútbol amateur</h2>
            <p>FutbolApp te permite registrar, gestionar y seguir los partidos locales en tiempo real. Vive el espíritu GranCanario del deporte desde cualquier lugar.</p>
        </section>
    </main>

    <footer>
        <p>🌞 FutbolApp 2025 El futbol de tu barrio</p>
        <a href="https://www.instagram.com/fflaspalmas/?hl=es" target="_blank" rel="noopener noreferrer">
         Síguenos en nuestra cuenta de Instagram
</a>

    </footer>
</body>
</html>
