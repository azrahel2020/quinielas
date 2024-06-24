<h1>Apuestas de {{ $user->name }} para la quiniela {{ $quiniela->name }}</h1>

    <table>
        <thead>
            <tr>
                <th>ID del Juego</th>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Apuesta Local</th>
                <th>Apuesta Visitante</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bets as $bet)
                <tr>
                    <td>{{ $bet->game->id }}</td>
                    <td>{{ optional($bet->game->home_team)->name ?? 'N/A' }}</td>
                    <td>{{ optional($bet->game->away_team)->name ?? 'N/A' }}</td>
                    <td>{{ $bet->bets_home }}</td>
                    <td>{{ $bet->bets_away }}</td>
                    <td>{{ $bet->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>