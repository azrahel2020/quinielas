<div class="container">
    <h1>Resultados de la Quiniela: {{ $quiniela->name }}</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.results.store', ['quinielaId' => $quiniela->id]) }}" method="POST">
        @csrf
        <div class="row">
            @foreach($games as $game)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Juego ID: {{ $game->id }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Equipo Local: {{ $game->homeTeam->name }}</label>
                                <input type="number" name="results[{{ $game->id }}][result_home]" class="form-control" value="{{ $game->result->result_home ?? old('results.' . $game->id . '.result_home') }}">
                            </div>
                            <div class="form-group">
                                <label>Equipo Visitante: {{ $game->awayTeam->name }}</label>
                                <input type="number" name="results[{{ $game->id }}][result_away]" class="form-control" value="{{ $game->result->result_away ?? old('results.' . $game->id . '.result_away') }}">
                            </div>
                            <div class="form-group">
                                <label>Fecha: {{ $game->date }}</label>
                            </div>
                            <div class="form-group">
                                <label>Estadio: {{ $game->stadium }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Guardar Resultados</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID del Juego</th>
                <th>Equipo Local</th>
                <th>Resultado Local</th>
                <th>Equipo Visitante</th>
                <th>Resultado Visitante</th>
                <th>Fecha</th>
                <th>Estadio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{ $game->id }}</td>
                    <td>{{ $game->homeTeam->name }}</td>
                    <td>{{ $game->result ? $game->result->result_home : '' }}</td>
                    <td>{{ $game->awayTeam->name }}</td>
                    <td>{{ $game->result ? $game->result->result_away : '' }}</td>
                    <td>{{ $game->date }}</td>
                    <td>{{ $game->stadium }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>