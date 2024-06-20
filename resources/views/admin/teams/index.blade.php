<h1>Lista de Equipos</h1>
<a href="{{ route('admin.teams.create') }}" class="btn btn-primary mb-3">Crear Quiniela</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }}</td>
                <td><img src="{{ asset('img/teams/' . $team->image) }}" alt="{{ $team->name }}" width="100"></td>
                <td>
                    <a href="{{ route('admin.teams.show', $team->id) }}">Mostrar</a>
                    <a href="{{ route('admin.teams.edit', $team->id) }}">Editar</a>
                    <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta quiniela?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>