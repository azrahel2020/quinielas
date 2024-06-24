<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Game;
use App\Models\Quiniela;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PointController extends Controller
{
   
    public function index($quinielaId)
    {
        // Obtener todos los juegos con sus resultados y apuestas para la quiniela específica
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with(['result', 'bets' => function($query) {
                        $query->orderByDesc('total')->with('user');
                    }])
                    ->orderBy('id')
                    ->get();

        return view('usuarios.bets.index', [
            'games' => $games,
            'quinielaId' => $quinielaId,
        ]);
    }
    public function ganador($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with('result', 'bets')
                    ->get();

        foreach ($games as $game) {
            $result = $game->result;
            if (!$result) {
                continue; // Si no hay resultado, pasar al siguiente juego
            }

            foreach ($game->bets as $bet) {
                $gameWinner = $this->determineWinner($result->result_home, $result->result_away);
                $betWinner = $this->determineWinner($bet->bets_home, $bet->bets_away);

                if ($gameWinner === $betWinner) {
                    $bet->update(['pointsGanador' => 5]);
                } else {
                    $bet->update(['pointsGanador' => 0]);
                }
            }
        }

    }

    public function resultadoIgualesHome($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with('result', 'bets')
                    ->get();

        foreach ($games as $game) {
            $result = $game->result;
            if (!$result) {
                continue; // Si no hay resultado, pasar al siguiente juego
            }

            foreach ($game->bets as $bet) {
                if ($result->result_home == $bet->bets_home) {
                    $bet->update(['pointsHome' => 5]);
                } else {
                    $bet->update(['pointsHome' => 0]);
                }
            }
        }

        
    }

    public function resultadoIgualesAway($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with('result', 'bets')
                    ->get();

        foreach ($games as $game) {
            $result = $game->result;
            if (!$result) {
                continue; // Si no hay resultado, pasar al siguiente juego
            }

            foreach ($game->bets as $bet) {
                if ($result->result_away == $bet->bets_away) {
                    $bet->update(['pointsAway' => 5]);
                } else {
                    $bet->update(['pointsAway' => 0]);
                }
            }
        }

        
    }

    public function altaBaja($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with('result', 'bets')
                    ->get();

        foreach ($games as $game) {
            $result = $game->result;
            if (!$result) {
                continue; // Si no hay resultado, pasar al siguiente juego
            }

            $resultSum = $result->result_home + $result->result_away;

            foreach ($game->bets as $bet) {
                $betSum = $bet->bets_home + $bet->bets_away;

                if (($resultSum < 3 && $betSum < 3) || ($resultSum > 2 && $betSum > 2)) {
                    $bet->update(['pointsAltaBaja' => 5]);
                } else {
                    $bet->update(['pointsAltaBaja' => 0]);
                }
            }
        }

        
    }

    public function total($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with('result', 'bets')
                    ->get();

        foreach ($games as $game) {
            foreach ($game->bets as $bet) {
                $totalPoints = $bet->pointsGanador + $bet->pointsHome + $bet->pointsAway + $bet->pointsAltaBaja;
                $bet->update(['total' => $totalPoints]);
            }
        }

        return redirect()->route('usuarios.bets.index', $quinielaId)
                         ->with('success', 'Total points calculated successfully.');
    }

    public function calcularPuntos($quinielaId)
    {
        $this->ganador($quinielaId);
        $this->resultadoIgualesHome($quinielaId);
        $this->resultadoIgualesAway($quinielaId);
        $this->altaBaja($quinielaId);
        $this->total($quinielaId);

        return redirect()->route('usuarios.bets.apuestas', $quinielaId)
                         ->with('success', 'All points calculated successfully.');
    }

    private function determineWinner($home, $away)
    {
        if ($home > $away) {
            return 'home';
        } elseif ($home < $away) {
            return 'away';
        } else {
            return 'draw';
        }
    }

    public function totales($quinielaId)
    {
        // Obtener todos los juegos (games) de la quiniela específica ($quinielaId)
        $games = Game::where('quiniela_id', $quinielaId)
                     ->with('bets') // Cargar relación: bets
                     ->get();

        // Inicializar variable para almacenar el total de puntos de todos los juegos
        $totalPoints = 0;

        // Iterar sobre cada juego para sumar los puntos totales
        foreach ($games as $game) {
            foreach ($game->bets as $bet) {
                $totalPoints += $bet->total;
            }
        }

        // Aquí puedes pasar $games y $totalPoints a la vista para mostrar la información

        return view('usuarios.bets.totales', compact('games', 'totalPoints'));
    }

    public function updateTotalFinal($quinielaId)
    {
        // Obtener todas las apuestas de la quiniela específica
        $bets = Bet::whereHas('game', function ($query) use ($quinielaId) {
            $query->where('quiniela_id', $quinielaId);
        })->with('user')->get();

        // Inicializar un array para almacenar los totales finales por usuario
        $userTotals = [];

        // Calcular la suma de todos los totales de cada juego para cada usuario
        foreach ($bets as $bet) {
            if (!isset($userTotals[$bet->user_id])) {
                $userTotals[$bet->user_id] = [
                    'user' => $bet->user,
                    'total_final' => 0
                ];
            }
            $userTotals[$bet->user_id]['total_final'] += $bet->total;
        }

        // Actualizar el campo total_final en cada apuesta
        foreach ($bets as $bet) {
            $bet->total_final = $userTotals[$bet->user_id]['total_final'];
            $bet->save();
        }

        // Ordenar los totales finales de mayor a menor
        usort($userTotals, function ($a, $b) {
            return $b['total_final'] - $a['total_final'];
        });

        // Pasar los totales finales a la vista
        return view('usuarios.bets.totales', ['userTotals' => $userTotals]);
    }

    
}