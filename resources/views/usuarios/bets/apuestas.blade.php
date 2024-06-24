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

<!-- container fit -->
<div class="container-fit2">

    <!-- card -->
    
     <!-- card -->
     @foreach ($games as $game)
     @foreach ($game->bets as $bet)
     <div class="card-apuestas">
         <div class="card-apuestas__fecha">
             <p>{{ $game->date->format('d-m-Y H:i') }}</p>
         </div>
         <div class="contenido-card">
             <div class="contenido-card__nombre">{{ $bet->user->name }}</div>
             <div class="data">
                 <div class="data__title">Resultado</div>
                 <div class="data__puntos">{{ $bet->pointsGanador }}</div>
                 <div class="data__resultado">{{ $game->result ? $game->result->result_home : '-' }}</div>
                 <div></div>
                 <div class="data__resultado">{{ $game->result ? $game->result->result_away : '-' }}</div>
                 <div class="data__puntos data__puntos--altabaja">{{ $bet->pointsAltaBaja }}</div>
                 <div></div>
                 <div class="data__img">
                     <img src="{{ asset('img/teams/' . $game->homeTeam->image) }}" alt="{{ $game->homeTeam->name }}">
                 </div>
                 <div class="data__img">
                     <img src="{{ asset('img/vs.png') }}" alt="vs">
                 </div>
                 <div class="data__img">
                     <img src="{{ asset('img/teams/' . $game->awayTeam->image) }}" alt="{{ $game->awayTeam->name }}">
                 </div>
                 <div></div>
                 <div></div>
                 <div class="data__nombre">{{ $game->homeTeam->name }}</div>
                 <div></div>
                 <div class="data__nombre">{{ $game->awayTeam->name }}</div>
                 <div></div>
                 <div class="data__puntos data__puntos--goles">{{ $bet->pointsHome }}</div>
                 <div class="data__apuesta">{{ $bet->bets_home }}</div>
                 <div></div>
                 <div class="data__apuesta">{{ $bet->bets_away }}</div>
                 <div class="data__puntos data__puntos--goles">{{ $bet->pointsAway }}</div>
                 <div class="data__title">Apuesta</div>
             </div>
         </div>
         <div class="card-apuestas__total">{{ $bet->total }}</div>
     </div>
     @endforeach
     @endforeach
    


   {{--  @foreach ($games as $game)
    <div class="card-apuestas2">
        <div class="fecha">
            <p>{{ $game->date->format('d-m-Y H:i') }}</p>
        </div>
        <div class="card-apuestas2__contenido">
            @foreach ($game->bets as $bet)
            <div class="card-apuestas">
                <div class="card-apuestas__nombre">{{ $bet->user->name }}</div>
                <div class="card-apuestas__puntos">
                    <div class="point point--ganador">{{ $bet->pointsGanador }}</div>
                    <div class="point point--goles">{{ $bet->pointsHome }}</div>
                </div>
                <div class="card-apuestas__content">
                    <div class="title">Resultado</div>
                    <div class="resultado">
                        @if ($game->result)
                        <p>{{ $game->result->result_home }}</p>
                        <p>-</p>
                        <p>{{ $game->result->result_away }}</p>
                        @else
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        @endif
                    </div>
                    <div class="img">
                        <img src="{{ asset('img/teams/' . $game->homeTeam->image) }}" class="card-quiniela__img" alt="{{ $game->homeTeam->name }}">
                        <img src="{{ asset('img/vs.png') }}" class="card-quiniela__img" alt="vs">
                        <img src="{{ asset('img/teams/' . $game->awayTeam->image) }}" class="card-quiniela__img" alt="{{ $game->awayTeam->name }}">
                    </div>
                    <div class="resultado">
                        <p>{{ $bet->bets_home }}</p>
                        <p>-</p>
                        <p>{{ $bet->bets_away }}</p>
                    </div>
                    <div class="title">Apuesta</div>
                </div>
                <div class="card-apuestas__puntos">
                    <div class="point point--altabaja">{{ $bet->pointsAltaBaja }}</div>
                    <div class="point point--goles">{{ $bet->pointsAway }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach --}}

</div>

@endsection
