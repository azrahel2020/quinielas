<div class="card">
    <div class="card-header">
        Crear Quiniela
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

        <form method="POST" action="{{ route('admin.quinielas.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="inicio">Fecha de Inicio</label>
                <input type="date" name="inicio" class="form-control" id="inicio" value="{{ old('inicio') }}" required>
            </div>
            <div class="form-group">
                <label for="final">Fecha Final</label>
                <input type="date" name="final" class="form-control" id="final" value="{{ old('final') }}" required>
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <div class="form-group">
                <label for="status">Estado</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="activo" {{ old('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Quiniela</button>
        </form>
    </div>
</div>