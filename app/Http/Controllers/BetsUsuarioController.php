<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBetRequest;
use App\Models\Bet;
use App\Models\Game;
use App\Models\Quiniela;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetsUsuarioController extends Controller
{
    public function quinielas()
    {
        // Lógica para obtener los datos y pasar a la vista
        $quinielas = Quiniela::all(); // Ejemplo de obtener todas las quinielas

        return view('usuarios.bets.quinielas', compact('quinielas'));
    }
    
    public function apuestas($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with(['homeTeam', 'awayTeam', 'result', 'bets.user'])
                    ->orderBy('id')
                    ->get();
    
        return view('usuarios.bets.apuestas', [
            'games' => $games,
            'quinielaId' => $quinielaId,
        ]);
    }

    public function create($quinielaId)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener todos los juegos de la quiniela específica
        $games = Game::with(['home_team', 'away_team'])->where('quiniela_id', $quinielaId)->orderBy('id')->get();

        // Obtener las apuestas del usuario autenticado para la quiniela específica
        $userBets = Bet::where('user_id', $user->id)->whereIn('game_id', $games->pluck('id'))->get();

        return view('usuarios.bets.create', [
            'games' => $games,
            'quinielaId' => $quinielaId,
            'userBets' => $userBets,
        ]);
    }

    public function store(Request $request, $quinielaId)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener los datos del formulario
        $gameIds = $request->input('game_ids', []);
        $betsHome = $request->input('bets_home', []);
        $betsAway = $request->input('bets_away', []);

        // Iterar sobre los juegos y crear las apuestas
        foreach ($gameIds as $index => $gameId) {
            $bet = new Bet();
            $bet->user_id = $user->id;
            $bet->game_id = $gameId;
            $bet->bets_home = $betsHome[$index];
            $bet->bets_away = $betsAway[$index];
            $bet->pointsGanador = 0; // Inicia con 0 puntos
            $bet->pointsHome = 0; // Inicia con 0 puntos
            $bet->pointsAway = 0; // Inicia con 0 puntos
            $bet->pointsAltaBaja = 0; // Inicia con 0 puntos
            $bet->total = 0; // Inicia con 0 puntos
            $bet->save();
        }

        // Redirigir a una página de éxito o a la lista de apuestas
        return redirect()->route('usuarios.bets.apuestas', ['quinielaId' => $quinielaId])
            ->with('success', 'Apuestas guardadas correctamente.');
    }
    /* public function store(Request $request, $quinielaId)
    {
        $user = Auth::user();

        foreach ($request->bets as $gameId => $betData) {
            Bet::create([
                'user_id' => $user->id,
                'game_id' => $gameId,
                'bets_home' => $betData['bets_home'],
                'bets_away' => $betData['bets_away'],
                'pointsGanador' => 0,
                'pointsHome' => 0,
                'pointsAway' => 0,
                'pointsAltaBaja' => 0,
                'total' => 0,
            ]);
        }

        return redirect()->route('usuarios.bets.index', $quinielaId)
                         ->with('success', 'Bets created successfully.');
    } */

    public function apuestaPorUsuario($quinielaId)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si la quiniela existe
        $quiniela = Quiniela::findOrFail($quinielaId);

        // Obtener todas las apuestas del usuario autenticado para la quiniela específica
        $bets = Bet::whereHas('game', function ($query) use ($quinielaId) {
            $query->where('quiniela_id', $quinielaId);
        })->where('user_id', $user->id)->get();

        // Devolver la vista con los datos de las apuestas
        return view('usuarios.bets.apuestaporusuario', compact('quiniela', 'user', 'bets'));
    }
    

       
}
