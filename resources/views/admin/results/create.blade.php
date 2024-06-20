<form action="{{ route('admin.results.store', $quinielaId) }}" method="POST">
    @csrf
    <!-- Iterar sobre los juegos -->
    @foreach ($games as $game)
        <div class="card mb-3">
            <div class="card-header">
                {{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="result_home_{{ $game->id }}">Resultado para {{ $game->homeTeam->name }}</label>
                    <input type="number" class="form-control" id="result_home_{{ $game->id }}" name="results[{{ $game->id }}][result_home]" required>
                </div>
                <div class="form-group">
                    <label for="result_away_{{ $game->id }}">Resultado para {{ $game->awayTeam->name }}</label>
                    <input type="number" class="form-control" id="result_away_{{ $game->id }}" name="results[{{ $game->id }}][result_away]" required>
                </div>
                <!-- Hidden input para almacenar el ID del juego -->
                <input type="hidden" name="results[{{ $game->id }}][game_id]" value="{{ $game->id }}">
            </div>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
