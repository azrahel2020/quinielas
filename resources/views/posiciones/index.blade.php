<h1>Quinielas</h1>
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
                    <a href="{{ route('posiciones.showBets', $quiniela->id) }}">
                        <button>Ver Apuestas</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>