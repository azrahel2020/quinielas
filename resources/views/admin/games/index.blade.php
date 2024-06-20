<div class="card">
    <div class="card-header">
        Juegos para la Quiniela: {{ $quiniela->name }}
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if($games->isEmpty())
            <p>No hay juegos disponibles para esta quiniela.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Equipo Local</th>
                        <th>Equipo Visitante</th>
                        <th>Fecha</th>
                        <th>Estadio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
                        <tr>
                            <td>{{ $game->homeTeam->name }}</td>
                            <td>{{ $game->awayTeam->name }}</td>
                            <td>{{ $game->date }}</td>
                            <td>{{ $game->stadium }}</td>
                            <td>
                                <a href="{{ route('admin.games.edit', ['game' => $game->id]) }}">Editar</a>
                                <form action="{{ route('admin.games.destroy', $game) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>