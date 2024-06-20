<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Juego</title>
</head>
<body>
    <h1>Detalles del Juego</h1>
    
    <ul>
        <li><strong>ID del Juego:</strong> {{ $game->id }}</li>
        <li><strong>Fecha:</strong> {{ $game->date }}</li>
        <li><strong>Estadio:</strong> {{ $game->stadium }}</li>
        <li><strong>Equipo Local:</strong> {{ $game->homeTeam->name }}</li>
        <li><strong>Equipo Visitante:</strong> {{ $game->awayTeam->name }}</li>
    </ul>
    
    <a href="{{ url('/quinielas/' . $game->quiniela_id . '/games') }}">Volver a la lista de juegos</a>
</body>
</html>