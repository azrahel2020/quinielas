<h1>Crear Nuevo Equipo</h1>
    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="image">Imagen:</label>
            <input type="file" id="image" name="image" required>
            
        </div>
        <button type="submit">Crear Equipo</button>
    </form>