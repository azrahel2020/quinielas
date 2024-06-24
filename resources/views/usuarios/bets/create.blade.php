@extends('layouts.master')

@section('title', 'Quinielas')

@section('content')
<div class="breadcrum">
    <div class="breadcrum__title">
        <h3>Agregar Apuestas</h3>
    </div>
    <div class="breadcrum__button">
        
        <a href="{{ route('usuarios.bets.create', ['quinielaId' => $quinielaId]) }}" class="botonagregar">
            Agregar
        </a>
    </div>
</div>

 <div class="container-fit3">

    <form action="{{ route('usuarios.bets.store', $quinielaId) }}" method="POST">
        @csrf
        @if ($games->isNotEmpty())
            @foreach ($games as $game)
                @php
                    $userBet = $userBets->where('game_id', $game->id)->first();
                @endphp
                @if (!$userBet)

                <div class="card-form">
                    <input type="hidden" name="game_ids[]" value="{{ $game->id }}">
                    <div class="card-form__fecha">
                        {{ $game->date->format('d/m/Y H:i') }}
                    </div>
                    <div class="card-form__imagenes">
                        <img src="{{ asset('img/teams/' . $game->homeTeam->image) }}" alt="{{ $game->homeTeam->name }}">
                        <img src="{{ asset('img/vs.png') }}" alt="vs">
                        <img src="{{ asset('img/teams/' . $game->awayTeam->image) }}" alt="{{ $game->awayTeam->name }}">
                    </div>
                    <div class="card-form__nombres">
                        <p>{{ $game->home_team->name }}</p>
                        <p></p>
                        <p>{{ $game->away_team->name }}</p>
                    </div>
                    <div class="card-form__input">
                        <input type="number" name="bets_home[]">
                        <p></p>
                        <input type="number" name="bets_away[]" >
                    </div>
                </div>


                @endif
                @endforeach
        @else
                <p>No hay juegos disponibles para esta quiniela.</p>
        @endif
            <button type="submit">Guardar Apuestas</button>
    </form>

    

</div>

@endsection

{{-- 

 <h1>Crear Apuestas para Quiniela ID: {{ $quinielaId }}</h1>

 <form action="{{ route('usuarios.bets.store', $quinielaId) }}" method="POST">
        @csrf
        @if ($games->isNotEmpty())
            @foreach ($games as $game)
                @php
                    $userBet = $userBets->where('game_id', $game->id)->first();
                @endphp
                @if (!$userBet)
                    <div>
                        <label for="game_{{ $game->id }}">{{ $game->home_team->name }} vs {{ $game->away_team->name }}</label>
                        <input type="hidden" name="game_ids[]" value="{{ $game->id }}">
                        <input type="number" name="bets_home[]" placeholder="Apuesta Local">
                        <input type="number" name="bets_away[]" placeholder="Apuesta Visitante">
                    </div>
                @endif
            @endforeach
        @else
            <p>No hay juegos disponibles para esta quiniela.</p>
        @endif
        <button type="submit">Guardar Apuestas</button>
    </form> --}}