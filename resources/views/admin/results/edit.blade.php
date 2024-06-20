<div class="container">
    <h2>Editar Resultado</h2>
    <div class="card mb-3">
        <div class="card-header">
            Juego: {{ $result->game->homeTeam->name }} vs {{ $result->game->awayTeam->name }}
        </div>
        <div class="card-body">
            <form action="{{ route('results.update', $result->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="result_home">Resultado Local</label>
                    <input type="number" id="result_home" name="result_home" class="form-control" value="{{ $result->result_home }}" required>
                </div>

                <div class="form-group">
                    <label for="result_away">Resultado Visitante</label>
                    <input type="number" id="result_away" name="result_away" class="form-control" value="{{ $result->result_away }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Resultado</button>
            </form>
        </div>
    </div>
    <a href="{{ route('results.index') }}" class="btn btn-secondary">Volver</a>
</div>