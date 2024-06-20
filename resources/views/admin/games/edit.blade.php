<div class="card">
    <div class="card-header">
        Editar Juego
    </div>
    <div class="card-body">
        <!-- Formulario de edición -->
        <form method="POST" action="{{ route('admin.games.update', ['game' => $game->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="home_team_id">Equipo Local</label>
                <select name="home_team_id" class="form-control" id="home_team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $game->home_team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="away_team_id">Equipo Visitante</label>
                <select name="away_team_id" class="form-control" id="away_team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ $team->id == $game->away_team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Fecha</label>
                <input type="datetime-local" name="date" class="form-control" id="date" value="{{ $game->date ? \Carbon\Carbon::parse($game->date)->format('Y-m-d\TH:i') : '' }}" required>
            </div>
            <div class="form-group">
                <label for="stadium">Estadio</label>
                <input type="text" name="stadium" class="form-control" id="stadium" value="{{ $game->stadium }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Juego</button>
        </form>
    </div>
</div>
