<h1>Total de Puntos Acumulados en Juegos</h1>

    @foreach ($games as $game)
        <h2>Juego ID: {{ $game->id }}</h2>
        <ul>
            @foreach ($game->bets as $bet)
                <li>
                    Usuario ID: {{ $bet->user_id }} - Puntos: {{ $bet->points }}
                </li>
            @endforeach
        </ul>
    @endforeach

    <h2>Total de Puntos Acumulados en Todos los Juegos:</h2>
    <p>{{ $totalPoints }}</p>