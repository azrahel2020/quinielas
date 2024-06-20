<div class="container">
    <h1>Apuestas de la Quiniela: {{ $quiniela->nombre }}</h1>
    
    <!-- Formulario para ingresar nuevas apuestas -->
    <form action="{{ route('admin.bets.store', ['quinielaId' => $quinielaId]) }}" method="POST">
        @csrf
        
        <!-- Campo oculto para el user_id -->
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        
        <!-- Iterar sobre cada juego y mostrar los campos para las apuestas -->
        @foreach($games as $game)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Juego ID: {{ $game->id }}</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="bets_home_{{ $game->id }}">Apuesta Local ({{ $game->homeTeam->name }})</label>
                    <input type="number" name="bets[{{ $game->id }}][bets_home]" id="bets_home_{{ $game->id }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="bets_away_{{ $game->id }}">Apuesta Visitante ({{ $game->awayTeam->name }})</label>
                    <input type="number" name="bets[{{ $game->id }}][bets_away]" id="bets_away_{{ $game->id }}" class="form-control" required>
                </div>
            </div>
        </div>
        @endforeach
    
        <!-- Botón para enviar el formulario -->
        <button type="submit" class="btn btn-primary">Guardar Apuestas</button>
    </form>
    
    <!-- Tabla para mostrar todas las apuestas -->
    <h2>Apuestas Realizadas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Juego</th>
                <th>Apuesta Local</th>
                <th>Apuesta Visitante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bets as $bet)
            <tr>
                <td>{{ $bet->id }}</td>
                <td>{{ $bet->user->name }}</td>
                <td>{{ $bet->game->homeTeam->name }} vs {{ $bet->game->awayTeam->name }}</td>
                <td>{{ $bet->bets_home }}</td>
                <td>{{ $bet->bets_away }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>