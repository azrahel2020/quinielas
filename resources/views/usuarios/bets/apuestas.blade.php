
<div class="container">
    <h1>Games and Bets for Quiniela {{ $quinielaId }}</h1>

    @foreach ($games as $game)
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">Game ID: {{ $game->id }}</h5>
            </div>
            <div class="card-body">
                <p>Home Team: {{ $game->homeTeam->name }}</p>
                <p>Away Team: {{ $game->awayTeam->name }}</p>
                @if ($game->result)
                    <p>Results: {{ $game->result->result_home }} - {{ $game->result->result_away }}</p>
                @else
                    <p>Results: Not yet available</p>
                @endif

                <h6>Bets:</h6>
                <ul>
                    @foreach ($game->bets as $bet)
                        <li>
                            <p>User: {{ $bet->user->name }}</p>
                            <p>Bets: {{ $bet->bets_home }} - {{ $bet->bets_away }}</p>
                            <p>Points Ganador: {{ $bet->pointsGanador }}</p>
                            <p>Points Home: {{ $bet->pointsHome }}</p>
                            <p>Points Away: {{ $bet->pointsAway }}</p>
                            <p>Points Alta/Baja: {{ $bet->pointsAltaBaja }}</p>
                            <p>Total: {{ $bet->total }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</div>
