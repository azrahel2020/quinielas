<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntos de Usuarios</title>
</head>
<body>
    <h1>Puntos de Usuarios por Quiniela</h1>
    @foreach($quinielas as $quiniela)
        <h2>{{ $quiniela->name }}</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quinielaUserPoints[$quiniela->id] as $userId => $points)
                    @php
                        $user = $users->firstWhere('id', $userId);
                    @endphp
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
    

    {{-- <div class="container">
        <h1>User Points by Quiniela</h1>
    
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    @foreach ($users->first()->bets as $bet)
                        <th>{{ $bet->game->quiniela->name }} Points</th>
                    @endforeach
                    <th>Total</th> <!-- Columna para la suma total -->
                </tr>
            </thead>
            <tbody>
                @php
                    // Ordenar los usuarios por la suma total de puntos en orden descendente
                    $sortedUsers = $users->sortByDesc(function ($user) {
                        return $user->bets->sum('points');
                    });
                @endphp
                @foreach ($sortedUsers as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        @php $totalPoints = 0; @endphp <!-- Inicializamos la suma total en 0 -->
                        @foreach ($user->bets as $bet)
                            <td>{{ $bet->points }}</td>
                            @php $totalPoints += $bet->points; @endphp <!-- Sumamos los puntos -->
                        @endforeach
                        <td>{{ $totalPoints }}</td> <!-- Mostramos la suma total -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
{{-- 
    <h1>Puntos de Usuarios por Quiniela</h1>

    @foreach($resultsByGame as $gameResults)
        <h2>{{ $gameResults->first()->game->name }}</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Puntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    @php
                        $points = $gameResults->where('game_id', $user->bets->first()->game_id)
                                              ->first()
                                              ->gamePoints
                                              ->sum('points');
                    @endphp
                    @if($points > 0)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $points }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach --}}
</body>
</html>
