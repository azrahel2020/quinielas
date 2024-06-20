<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posiciones - {{ $quiniela->name }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Posiciones para la Quiniela: {{ $quiniela->name }}</h1>
    <p>Fecha de Inicio: {{ $quiniela->inicio }}</p>
    <p>Fecha Final: {{ $quiniela->final }}</p>
    <p>Total de Puntos en la Quiniela: {{ $totalPoints }}</p>

    <h2>Puntos por Usuario</h2>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userPoints as $userId => $points)
                <tr>
                    <td>{{ \App\Models\User::find($userId)->name }}</td>
                    <td>{{ $points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Apuestas</h2>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bets as $bet)
                <tr>
                    <td>{{ $bet->user->name }}</td>
                    <td>{{ $bet->game->homeTeam->name }}</td>
                    <td>{{ $bet->game->awayTeam->name }}</td>
                    <td>{{ $bet->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>