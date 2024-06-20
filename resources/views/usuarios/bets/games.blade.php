<!-- resources/views/games.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos de Quiniela</title>
</head>
<body>
    <h1>Juegos de Quiniela</h1>
    
    @if(count($games) > 0)
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Estadio</th>
                    <th>Local</th>
                    <th>Visitante</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->date }}</td>
                        <td>{{ $game->stadium }}</td>
                        <td>{{ $game->homeTeam->name }}</td>
                        <td>{{ $game->awayTeam->name }}</td>
                        <td>
                            <a href="{{ url('/quinielas/' . $game->quiniela_id . '/games/' . $game->id) }}">Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay juegos disponibles en esta quiniela.</p>
    @endif
</body>
</html>
