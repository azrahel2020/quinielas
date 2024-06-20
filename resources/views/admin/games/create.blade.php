<div class="card">
    <div class="card-header">
        Crear Juego para Quiniela: {{ $quinielas->find($quinielaId)->name }}
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.games.store') }}">
            @csrf
            <input type="hidden" name="quiniela_id" value="{{ $quinielaId }}">
            <div class="form-group">
                <label for="home_team_id">Equipo Local</label>
                <select name="home_team_id" class="form-control" id="home_team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="away_team_id">Equipo Visitante</label>
                <select name="away_team_id" class="form-control" id="away_team_id" required>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date">Fecha</label>
                <input type="datetime-local" name="date" class="form-control" id="date" value="{{ old('date') }}" required>
            </div>
            <div class="form-group">
                <label for="stadium">Estadio</label>
                <input type="text" name="stadium" class="form-control" id="stadium" value="{{ old('stadium') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Juego</button>
        </form>

        <hr>

        
    </div>
</div>