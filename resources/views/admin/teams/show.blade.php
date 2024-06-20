<h1>Detalles del Equipo</h1>
    <div>
        <p><strong>ID:</strong> {{ $team->id }}</p>
        <p><strong>Nombre:</strong> {{ $team->name }}</p>
        <p><strong>Imagen:</strong></p>
        <img src="{{ asset('img/teams/' . $team->image) }}" alt="{{ $team->name }}" width="200">
    </div>
    <a href="{{ route('admin.teams.index') }}">Volver a la lista de equipos</a>