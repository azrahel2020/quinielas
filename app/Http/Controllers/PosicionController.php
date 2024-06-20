<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Quiniela;
use Illuminate\Http\Request;

class PosicionController extends Controller
{
    public function index()
    {
        $quinielas = Quiniela::all();
        return view('posiciones.index', compact('quinielas'));
    }

    public function showBets($quinielaId)
    {
        // Encontrar la quiniela por su ID
        $quiniela = Quiniela::findOrFail($quinielaId);
        
        // Obtener todas las apuestas relacionadas con la quiniela
        $bets = Bet::with(['user', 'game.homeTeam', 'game.awayTeam'])
                    ->whereHas('game', function($query) use ($quinielaId) {
                        $query->where('quiniela_id', $quinielaId);
                    })->get();

        // Calcular la sumatoria de puntos por usuario
        $userPoints = [];
        foreach ($bets as $bet) {
            if (!isset($userPoints[$bet->user_id])) {
                $userPoints[$bet->user_id] = 0;
            }
            $userPoints[$bet->user_id] += $bet->points;
        }

        // Calcular la sumatoria total de puntos en la quiniela
        $totalPoints = $bets->sum('points');

        // Ordenar los usuarios por puntos de mayor a menor
        arsort($userPoints);

        return view('posiciones.show', compact('quiniela', 'bets', 'userPoints', 'totalPoints'));
    }

    /* public function showBets($quinielaId)
    {
        $quiniela = Quiniela::findOrFail($quinielaId);
        $bets = Bet::with('user', 'game')
                    ->whereHas('game', function($query) use ($quinielaId) {
                        $query->where('quiniela_id', $quinielaId);
                    })->get();

        // Calcular la sumatoria de puntos por usuario
        $userPoints = [];
        foreach ($bets as $bet) {
            if (!isset($userPoints[$bet->user_id])) {
                $userPoints[$bet->user_id] = 0;
            }
            $userPoints[$bet->user_id] += $bet->points;
        }

        // Calcular la sumatoria total de puntos en la quiniela
        $totalPoints = $bets->sum('points');

        // Ordenar los usuarios por puntos de mayor a menor
        arsort($userPoints);

        return view('posiciones.show', compact('quiniela', 'bets', 'userPoints', 'totalPoints'));
    } */
}
