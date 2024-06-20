<div class="container">
    <h1>Editar Quiniela</h1>
    <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre de la team</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required>
        </div>
       
        <div class="form-group">
            <label for="image">Imagen Actual</label>
            <img src="{{ asset('img/teams/' . $team->image) }}" alt="Imagen de los equipos" class="img-thumbnail" style="max-width: 200px;">
            <input type="file" class="form-control-file mt-2" id="image" name="image">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Actualizar team</button>
    </form>
</div>