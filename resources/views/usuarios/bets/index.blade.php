<div class="container">
    <h1>Games and Bets for Quiniela {{ $quinielaId }}</h1>
    @foreach($games as $game)
        <h2>Game ID: {{ $game->id }}</h2>
        <p>Home Team: {{ $game->homeTeam->name ?? 'N/A' }}</p>
        <p>Away Team: {{ $game->awayTeam->name ?? 'N/A' }}</p>
        @if ($game->result)
            <p>Results: {{ $game->result->result_home }} - {{ $game->result->result_away }}</p>
        @else
            <p>No results available yet.</p>
        @endif
        <p>Date: {{ $game->date }}</p>
        <p>Stadium: {{ $game->stadium }}</p>
        
        <h3>Bets:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Home</th>
                    <th>Away</th>
                    <th>Ganador</th>
                    <th>= Local</th>
                    <th>= visitante</th>
                    <th>Alta Baja</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($game->bets as $bet)
                    <tr>
                        <td>{{ $bet->user->name }}</td>
                        <td>{{ $bet->bets_home }}</td>
                        <td>{{ $bet->bets_away }}</td>
                        <td>{{ $bet->pointsGanador }}</td>
                        <td>{{ $bet->pointsHome }}</td>
                        <td>{{ $bet->pointsAway }}</td>
                        <td>{{ $bet->pointsAltaBaja }}</td>
                        <td>{{ $bet->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div> 