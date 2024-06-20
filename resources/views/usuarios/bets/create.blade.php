<div class="container">
    <h1>Create Bets for Quiniela {{ $quinielaId }}</h1>

    <form action="{{ route('usuarios.bets.store', $quinielaId) }}" method="POST">
        @csrf
        @foreach ($games as $game)
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">Game ID: {{ $game->id }}</h5>
                </div>
                <div class="card-body">
                    <p>Home Team: {{ $game->homeTeam->name }}</p>
                    <p>Away Team: {{ $game->awayTeam->name }}</p>

                    <div class="form-group">
                        <label for="bets_home_{{ $game->id }}">Bets Home</label>
                        <input type="number" class="form-control" id="bets_home_{{ $game->id }}" name="bets[{{ $game->id }}][bets_home]" required>
                    </div>
                    <div class="form-group">
                        <label for="bets_away_{{ $game->id }}">Bets Away</label>
                        <input type="number" class="form-control" id="bets_away_{{ $game->id }}" name="bets[{{ $game->id }}][bets_away]" required>
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit Bets</button>
    </form>
</div>