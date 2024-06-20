<div class="card">
    <div class="card-header">
        Editar Quiniela
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

        <form method="POST" action="{{ route('admin.quinielas.update', $quiniela) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $quiniela->name) }}" required>
            </div>
            <div class="form-group">
                <label for="inicio">Fecha de Inicio</label>
                
                <input type="datetime-local" name="inicio" class="form-control" id="inicio" value="{{ old('inicio', $quiniela->inicio) }}" required>
            </div>
            <div class="form-group">
                <label for="final">Fecha Final</label>
                <input type="datetime-local" name="final" class="form-control" id="final" value="{{ old('final', $quiniela->final) }}" required>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" name="image" class="form-control-file" id="image">
                <img src="{{ asset('img/quinielas/' . $quiniela->image) }}" alt="Imagen de la quiniela" width="100" class="mt-2">
            </div>
            <div class="form-group">
                <label for="status">Estado</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="Activa" {{ old('status', $quiniela->status) == 'Activa' ? 'selected' : '' }}>Activa</option>
                    <option value="Inactiva" {{ old('status', $quiniela->status) == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Quiniela</button>
        </form>
    </div>
</div>
