<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntos de Usuarios</title>
</head>
<body>
    <h1>Todas las Apuestas con Puntos</h1>
    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bets as $bet)
            <tr>
                <td>{{ $bet->user->name }}</td>
                <td>{{ $bet->points }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
