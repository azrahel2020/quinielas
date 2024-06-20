
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiniela->name }}</title>
</head>
<body>
    <h1>{{ $quiniela->name }}</h1>
    <h2>Games</h2>
    <ul>
        @foreach($games as $game)
            <li>
                Fecha: {{ $game->date }} - Estadio: {{ $game->stadium }}<br>
                Local: {{ $game->homeTeam->name }} vs Visitante: {{ $game->awayTeam->name }}
            </li>
        @endforeach
    </ul>
    
    
    


</body>
</html>

{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiniela->name }}</title>
</head>
<body>
    <h1>{{ $quiniela->name }}</h1>
    <h2>Games</h2>
    <ul>
        @foreach($games as $game)
            <li>
                Fecha: {{ $game->date }} - Estadio: {{ $game->stadium }}<br>
                Local: {{ $game->homeTeam->name }} vs Visitante: {{ $game->awayTeam->name }}
            </li>
        @endforeach
    </ul>
    
    <!-- Botón para calcular puntos -->
    <a href="{{ route('points.ganador') }}" class="btn btn-primary">Calcular Puntos</a>
    


</body>
</html> --}}