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
    public function apuestas($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)
                    ->with(['result', 'bets.user'])
                    ->orderBy('id')
                    ->get();

        return view('usuarios.bets.apuestas', [
            'games' => $games,
            'quinielaId' => $quinielaId,
        ]);
    }

    public function create($quinielaId)
    {
        $games = Game::where('quiniela_id', $quinielaId)->orderBy('id')->get();

        return view('usuarios.bets.create', [
            'games' => $games,
            'quinielaId' => $quinielaId,
        ]);
    }

    public function store(Request $request, $quinielaId)
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
    }

    

       
}
