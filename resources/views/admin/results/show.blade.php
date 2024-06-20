<div class="container">
    <h2>Detalles del Resultado</h2>
    <div class="card mb-3">
        <div class="card-header">
            Juego: {{ $result->game->homeTeam->name }} vs {{ $result->game->awayTeam->name }}
        </div>
        <div class="card-body">
            <p><strong>Resultado Local:</strong> {{ $result->result_home }}</p>
            <p><strong>Resultado Visitante:</strong> {{ $result->result_away }}</p>
            <p><strong>Fecha del Juego:</strong> {{ $result->game->date }}</p>
            <p><strong>Estadio:</strong> {{ $result->game->stadium }}</p>
        </div>
    </div>
    <a href="{{ route('results.index') }}" class="btn btn-secondary">Volver</a>
</div>