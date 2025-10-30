<!doctype html>
<html>
<head>
    <title>Registrar Partido</title>
</head>
<body>
    <h1>Registrar Partido</h1>
    <a href="{{ route('home') }}">Inicio</a> |
    <a href="{{ route('partidos.index') }}">Ver Partidos</a>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('partidos.store') }}">
        @csrf
        <label>Fecha:</label>
        <input type="date" name="fecha" value="{{ old('fecha') }}"><br><br>

        <label>Hora:</label>
        <input type="time" name="hora" value="{{ old('hora') }}"><br><br>

        <label>Equipo Local:</label>
        <input type="text" name="local" value="{{ old('local') }}"><br><br>

        <label>Equipo Visitante:</label>
        <input type="text" name="visitante" value="{{ old('visitante') }}"><br><br>

        <label>Ubicación:</label>
        <input type="text" name="ubicacion" value="{{ old('ubicacion') }}"><br><br>

        <label>Notas:</label><br>
        <textarea name="notas" rows="3">{{ old('notas') }}</textarea><br><br>

        <button type="submit">Guardar Partido</button>
    </form>
</body>
</html>