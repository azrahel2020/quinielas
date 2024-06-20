<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quinielas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Quinielas</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Imagen</th>
                    <th>Status</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($quinielas as $quiniela)
                    <tr>
                        <td>{{ $quiniela->id }}</td>
                        <td>{{ $quiniela->name }}</td>
                        <td>{{ $quiniela->inicio }}</td>
                        <td>{{ $quiniela->final }}</td>
                        <td><img src="{{ asset('images/' . $quiniela->image) }}" alt="{{ $quiniela->name }}" width="50"></td>
                        <td>{{ $quiniela->status }}</td>
                        <td><a href="{{ url('/quinielas/' . $quiniela->id . '/apuestas') }}" class="btn btn-primary">todas las apuestas</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
</body>
</html>