{{-- <div class="container">
    @foreach ($games as $game)
        <div class="card mb-3">
            <div class="card-header">
                Juego: {{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}
            </div>
            <div class="card-body">
                @php
                    $bet = $game->bets->first();
                @endphp
                <form action="{{ route('bets.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="game_id" value="{{ $game->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="form-group">
                        <label for="bets_home{{ $game->id }}">Apuesta Local:</label>
                        <input type="number" id="bets_home{{ $game->id }}" name="bets_home" class="form-control" value="{{ $bet ? $bet->bets_home : '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="bets_away{{ $game->id }}">Apuesta Visitante:</label>
                        <input type="number" id="bets_away{{ $game->id }}" name="bets_away" class="form-control" value="{{ $bet ? $bet->bets_away : '' }}">
                    </div>

                    <button type="submit" class="btn btn-primary">{{ $bet ? 'Actualizar Apuesta' : 'Crear Apuesta' }}</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
 --}}
{{--  <div class="container">
    <form action="{{ route('bets.store') }}" method="POST">
        @csrf
        @foreach ($games as $game)
            <div class="card mb-3">
                <div class="card-header">
                    Juego: {{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}
                </div>
                <div class="card-body">
                    @php
                        $bet = $game->bets->first();
                    @endphp
                    <input type="hidden" name="bets[{{ $game->id }}][game_id]" value="{{ $game->id }}">
                    
                    <div class="form-group">
                        <label for="bets_home{{ $game->id }}">Apuesta Local:</label>
                        <input type="number" id="bets_home{{ $game->id }}" name="bets[{{ $game->id }}][bets_home]" class="form-control" value="{{ $bet ? $bet->bets_home : '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="bets_away{{ $game->id }}">Apuesta Visitante:</label>
                        <input type="number" id="bets_away{{ $game->id }}" name="bets[{{ $game->id }}][bets_away]" class="form-control" value="{{ $bet ? $bet->bets_away : '' }}">
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Guardar Apuestas</button>
    </form>
</div> --}}

{{-- <h1>Create Bet</h1>
    <p>Quiniela: {{ $quiniela->name }}</p>

    <form action="{{ route('bets.store', $quiniela->id) }}" method="POST">
        @csrf
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required>

        <label for="game_id">Game ID:</label>
        <input type="text" name="game_id" required>

        <label for="bets_home">Bets Home:</label>
        <input type="text" name="bets_home" required>

        <label for="bets_away">Bets Away:</label>
        <input type="text" name="bets_away" required>

        <button type="submit">Submit</button>
    </form> --}}

   
    <h1>Crear apuestas para la quiniela: {{ $quiniela->name }}</h1>

    <h2>Juegos:</h2>
    <form action="{{ route('bets.store') }}" method="POST">
        @csrf
        <!-- Iteramos sobre los juegos y creamos un campo oculto para cada juego -->
        @foreach ($quiniela->games as $game)
            <input type="hidden" name="games[{{ $game->id }}][game_id]" value="{{ $game->id }}">
            <label for="games[{{ $game->id }}][bets_home]">Goles Equipo Local para {{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}:</label>
            <input type="number" name="games[{{ $game->id }}][bets_home]" required>
            <br>
            <label for="games[{{ $game->id }}][bets_away]">Goles Equipo Visitante para {{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}:</label>
            <input type="number" name="games[{{ $game->id }}][bets_away]" required>
            <br>
        @endforeach
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <button type="submit">Guardar Apuestas</button>
    </form>
