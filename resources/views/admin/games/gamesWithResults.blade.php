<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos con Resultados</title>
</head>
<body>
    <h1>Juegos con Resultados</h1>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Estadio</th>
                <th>Local</th>
                <th>Visitante</th>
                <th>Resultado Local</th>
                <th>Resultado Visitante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{ $game->date }}</td>
                    <td>{{ $game->stadium }}</td>
                    <td>{{ $game->homeTeam->name }}</td>
                    <td>{{ $game->awayTeam->name }}</td>
                    @if($game->result)
                        <td>{{ $game->result->result_home }}</td>
                        <td>{{ $game->result->result_away }}</td>
                    @else
                        <td>Sin Resultado</td>
                        <td>Sin Resultado</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
