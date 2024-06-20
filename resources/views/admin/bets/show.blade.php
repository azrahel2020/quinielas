<div class="container">
    <h1>Detalle de Apuesta</h1>
    <p><strong>Usuario:</strong> {{ $bet->user->name }}</p>
    <p><strong>Quiniela:</strong> {{ $bet->game->quiniela->name }}</p>
    <p><strong>Juego:</strong> {{ $bet->game->homeTeam->name }} vs {{ $bet->game->awayTeam->name }}</p>
    <p><strong>Fecha:</strong> {{ $bet->game->date }}</p>
    <p><strong>Estadio:</strong> {{ $bet->game->stadium }}</p>
    <p><strong>Apuesta a Favor del Equipo Local:</strong> {{ $bet->bets_home }}</p>
    <p><strong>Apuesta a Favor del Equipo Visitante:</strong> {{ $bet->bets_away }}</p>
    <p><strong>Puntos Obtenidos:</strong> {{ $bet->points }}</p>
    <a href="{{ route('bets.index') }}">Volver a la lista de apuestas</a>
</div>