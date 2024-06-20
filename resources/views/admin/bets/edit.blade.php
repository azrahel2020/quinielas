<div class="container">
    <h2>Editar Apuesta</h2>
    <div class="card mb-3">
        <div class="card-header">
            Juego: {{ $bet->game->homeTeam->name }} vs {{ $bet->game->awayTeam->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('bets.update', $bet->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="bets_home">Apuesta Local:</label>
                    <input type="number" id="bets_home" name="bets_home" class="form-control" value="{{ $bet->bets_home }}">
                </div>

                <div class="form-group">
                    <label for="bets_away">Apuesta Visitante:</label>
                    <input type="number" id="bets_away" name="bets_away" class="form-control" value="{{ $bet->bets_away }}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Apuesta</button>
            </form>
        </div>
    </div>
</div>