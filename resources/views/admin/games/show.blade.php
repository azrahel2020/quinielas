<h1>Detalles del Juego</h1>

<p><strong>ID:</strong> {{ $game->id }}</p>
<p><strong>Fecha:</strong> {{ $game->date }}</p>
<p><strong>Estadio:</strong> {{ $game->stadium }}</p>
<p><strong>Quiniela:</strong> {{ $game->quiniela->name }}</p>
<p><strong>Equipo Local:</strong> {{ $game->homeTeam->name }}</p>
<p><strong>Equipo Visitante:</strong> {{ $game->awayTeam->name }}</p>

<a href="{{ route('games.index') }}">Volver a la lista de juegos</a>