@extends('layouts.master')

@section('title', 'Quinielas')

@section('content')
    <div class="breadcrum">
        <div class="breadcrum__title">
            <h3>Agregar Quiniela</h3>
        </div>
        <div class="breadcrum__button">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarQuiniela">
                Agregar
            </button>
            
        </div>
        <!-- Mostrar mensajes de error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Modal  Agregar Quiniela-->
        <form method="POST" action="{{ route('admin.quinielas.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="agregarQuiniela" tabindex="-1" aria-labelledby="agregarQuinielaLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-content--quiniela">
                        <h2 class="modal-content--quiniela__title">Agregar Quiniela</h2>
                        <img src="../img/quiniela.png" class="modal-content--quiniela__img"  alt="">
                        
                        
                        <img id="imagePreview" class="modal-content--quiniela__imagePreview" src="#" onerror="this.style.display='none'">
                        <div class="modal-content--quiniela__fechas">
                            <div class="date-container">
                                <label for="inicio">Inicio</label>
                                {{-- <input type="date" id="inicio" class="custom-date-input"> --}}
                                <input type="date" name="inicio" class="custom-date-input" id="inicio" value="{{ old('inicio') }}" required>
                            </div>
                            <div class="date-container">
                                <label for="">Final: </label>
                                {{-- <input type="date" class="custom-date-input"> --}}
                                <input type="date" name="final" class="custom-date-input" id="final" value="{{ old('final') }}" required>
                            </div>
                        </div>
                        <div class="select-container">
                            <label for="opciones">Estado</label>
                            {{-- <select id="opciones" class="custom-select">
                                <option value="opcion1">Activa</option>
                                <option value="opcion2">Terminada</option>
                                <option value="opcion3">Opción 3</option>
                            </select> --}}
                            <select name="status" class="custom-select" id="status" required>
                                <option value="Activa" {{ old('status') == 'Activa' ? 'selected' : '' }}>Activa</option>
                                <option value="Inactiva" {{ old('status') == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
                            </select>
                        </div>

                        <label for="image" class="modal-content--quiniela__upload">
                            <img src="../img/subir_imagen.png"/>
                            <input id="image" type="file" name="image" id="image" accept="image/*" onchange="previewImageAdd(event)" />
                        </label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required placeholder="name">
                        <button class="btn btn-lg btn-success">Agregar</button>
                        <button type="submit" class="modal-content--quiniela__close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal  Editar Quiniela-->
        <div class="modal fade" id="EditarQuiniela" tabindex="-1" aria-labelledby="EditarQuinielaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-content--quiniela">
                    <h2 class="modal-content--quiniela__title">Editar Quiniela</h2>
                    <img src="./img/quiniela.png" class="modal-content--quiniela__img"  alt="">
                    
                    
                    <img id="imagePreviewEdit" class="modal-content--quiniela__imagePreview" src="#" onerror="this.style.display='none'">
                    <div class="modal-content--quiniela__fechas">
                        <div class="date-container">
                            <label for="inicio">Inicio</label>
                            <input type="date" id="inicio" class="custom-date-input">
                        </div>
                        <div class="date-container">
                            <label for="">Final: </label>
                            <input type="date" class="custom-date-input">
                        </div>
                    </div>
                    <div class="select-container">
                        <label for="opciones">Estado</label>
                        <select id="opciones" class="custom-select">
                            <option value="opcion1">Activa</option>
                            <option value="opcion2">Terminada</option>
                            <option value="opcion3">Opción 3</option>
                        </select>
                    </div>

                    <label for="imageEdit" class="modal-content--quiniela__upload">
                        <img src="./img/subir_imagen.png"/>
                        <input id="imageEdit" type="file" name="image" accept="image/*" onchange="previewImageEdit(event)" required />
                    </label>
                    <button class="btn btn-lg btn-success">Agregar</button>
                    <button type="button" class="modal-content--quiniela__close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
            </div>
        </div>


    </div>
    <!-- container fit -->
    <div class="container-fit">
        <!-- card quiniela -->
        @foreach ($quinielas as $quiniela)
            <div class="card-quiniela">
                <div class="card-quiniela__fecha">
                    <div class="inicio">
                        {{ $quiniela->inicio->format('d-m-Y') }}
                    </div>
                    <div class="final">
                        {{ $quiniela->final->format('d-m-Y') }}
                    </div>
                </div>
                
                {{-- <img src="../img/quinielas/{{ $quiniela->image }}" class="card-quiniela__img"> --}}
                <img src="{{ asset('img/quinielas/' . $quiniela->image) }}" alt="{{ $quiniela->name }}" class="card-quiniela__img">

                <div class="card-quiniela__estado">
                    <span class="badge rounded-pill text-bg-success">{{ $quiniela->status }}</span>
                </div>
                <div class="card-quiniela__nombre">
                    {{ $quiniela->name }}
                </div>
                <a type="button" href="{{ route('admin.quinielas.edit', $quiniela->id) }}" class="card-quiniela__btn card-quiniela__btn--edit" {{-- data-bs-toggle="modal" data-bs-target="#EditarQuiniela" --}}>
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <form action="{{ route('admin.quinielas.destroy', $quiniela) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="card-quiniela__btn card-quiniela__btn--delete" onclick="return confirm('¿Estás seguro de que quieres eliminar esta quiniela?')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                {{-- <div class="card-quiniela__btn card-quiniela__btn--delete">
                    <i class="fa-solid fa-trash"></i>
                </div> --}}
                {{-- <a href="{{ route('admin.quinielas.edit', $quiniela->id) }}" class="btn btn-primary">Editar</a> --}}
            </div>
        @endforeach
        


    
    
    </div>

    <!-- Paginacion -->
    <div class="pagina">
        <div class="pagination">
            <button class="btn-nav left-btn">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="page-numbers">
                <button class="btn-page">1</button>
                <button class="btn-page">2</button>
                <button class="btn-page btn-selected">3</button>
                <button class="btn-page">4</button>
                
            </div>
            <button class="btn-nav right-btn">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
@endsection


{{--
    
    
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
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <a href="{{ route('admin.quinielas.create') }}" class="btn btn-primary mb-3">Crear Quiniela</a>
        
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
                            <td><img src="../img/quinielas/{{ $quiniela->image }}" class="card-quiniela__img" alt="" style="max-width: 50px; max-height: 50px;"></td>
                            <td>{{ $quiniela->name }}</td>
                            <td> {{ $quiniela->inicio->format('d-m-Y') }}</td>
                            <td>{{ $quiniela->final->format('d-m-Y') }}</td>
                            <td>{{ $quiniela->status }}</td>
                            <td>
                                @foreach($quiniela->games as $game)
                                    Fecha: {{ $game->date }} - Estadio: {{ $game->stadium }}<br>
                                    Local: {{ $game->homeTeam->name }} vs Visitante: {{ $game->awayTeam->name }}<br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.quinielas.show', $quiniela->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('admin.quinielas.edit', $quiniela->id) }}" class="btn btn-primary">Editar</a>
                                <form action="{{ route('admin.quinielas.destroy', $quiniela) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                                <a href="{{ route('admin.games.create', ['quinielaId' => $quiniela->id]) }}" class="btn btn-success btn-sm">Crear Juego</a>
                                <a href="{{ route('admin.games.index', ['quinielaId' => $quiniela->id]) }}" class="btn btn-info">Ver juegos</a>
                                <a href="{{ route('admin.results.index', ['quinielaId' => $quiniela->id]) }}" class="btn btn-primary">Ver Resultados</a>
                                <a href="{{ route('admin.bets.index', ['quinielaId' => $quiniela->id]) }}" class="btn btn-primary">Ver apuestas</a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

 

    

</body>
</html> --}}