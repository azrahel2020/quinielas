<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quinielas</title>
</head>
<body>

    <div class="container">
        <h1>Lista de Quinielas</h1>
        <a href="{{ route('quinielas.create') }}" class="btn btn-primary mb-3">Crear Quiniela</a>
    
        @if ($quinielas->isEmpty())
            <p>No hay quinielas disponibles.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Inicio</th>
                        <th>Final</th>
                        <th>Estado</th>
                        <th>Juegos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quinielas as $quiniela)
                        <tr>
                            <td>{{ $quiniela->id }}</td>
                            <td><img src="../img/quinielas/{{ $quiniela->image }}" alt="" style="max-width: 50px; max-height: 50px;"></td>
                            <td>{{ $quiniela->name }}</td>
                            <td>{{ $quiniela->inicio }}</td>
                            <td>{{ $quiniela->final }}</td>
                            <td>{{ $quiniela->status }}</td>
                            <td>
                                @foreach($quiniela->games as $game)
                                    Fecha: {{ $game->date }} - Estadio: {{ $game->stadium }}<br>
                                    Local: {{ $game->homeTeam->name }} vs Visitante: {{ $game->awayTeam->name }}<br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('quinielas.show', $quiniela->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('quinielas.edit', $quiniela->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('quinielas.destroy', $quiniela->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta quiniela?')">Eliminar</button>
                                </form>
                                <a href="{{ route('bets.create', ['quiniela' => $quiniela->id]) }}" class="btn btn-success mt-2">Crear Apuesta</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>





    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Final</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quinielas as $quiniela)
                <tr>
                    <td>{{ $quiniela->id }}</td>
                    <td>{{ $quiniela->name }}</td>
                    <td>{{ $quiniela->inicio }}</td>
                    <td>{{ $quiniela->final }}</td>
                    <td>
                        <a href="{{ route('quinielas.show', $quiniela->id) }}">
                            <button>Ver Apuestas</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 

</body>
</html>