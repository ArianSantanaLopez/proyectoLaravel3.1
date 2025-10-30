<!doctype html>
<html>
<head>
    <title>Listado de Partidos</title>
</head>
<body>
    <h1>Partidos registrados</h1>
    <a href="{{ route('home') }}">Inicio</a> |
    <a href="{{ route('partidos.create') }}">Registrar Partido</a>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(count($partidos) === 0)
        <p>No hay partidos registrados.</p>
    @else
        <table border="1" cellpadding="6">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Local</th>
                    <th>Visitante</th>
                    <th>Ubicación</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partidos as $p)
                <tr>
                    <td>{{ $p['fecha'] }}</td>
                    <td>{{ $p['hora'] }}</td>
                    <td>{{ $p['local'] }}</td>
                    <td>{{ $p['visitante'] }}</td>
                    <td>{{ $p['ubicacion'] }}</td>
                    <td>{{ $p['notas'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>