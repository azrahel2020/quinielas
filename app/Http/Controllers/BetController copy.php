<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBetRequest;
use App\Http\Requests\UpdateBetRequest;
use App\Models\Bet;
use App\Models\Game;
use App\Models\Quiniela;
use App\Models\User;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /* public function index()
    {
        $bets = Bet::all();
        return view('bets.index', compact('bets'));
    } */

    public function index()
    {
        // Obtener todas las apuestas con los usuarios y los juegos relacionados
        $bets = Bet::with(['user', 'game.quiniela'])->get();

        // Retornar una vista con los datos
        return view('bets.index', compact('bets'));
    }


    // Método para mostrar el formulario de creación de apuestas con juegos y apuestas del usuario autenticado
    /* public function create()
    {
        $userId = auth()->id();
        $games = Game::with(['homeTeam', 'awayTeam', 'bets' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->get();

        return view('bets.create', compact('games'));
    } */

    public function create($quinielaId)
    {
        // Encuentra la quiniela correspondiente
        $quiniela = Quiniela::findOrFail($quinielaId);

        // Aquí podrías retornar la vista para crear una nueva apuesta en la quiniela especificada,
        // pasando también la quiniela para que puedas mostrar información sobre ella en el formulario
        return view('bets.create', compact('quiniela'));
    }

    /**
     * Store a newly created resource in storage.
     */
   /*  public function store(StoreBetRequest $request)
    {
        $userId = auth()->id();

        // Guardar o actualizar todas las apuestas
        foreach ($request->bets as $betData) {
            Bet::updateOrCreate(
                ['game_id' => $betData['game_id'], 'user_id' => $userId],
                ['bets_home' => $betData['bets_home'], 'bets_away' => $betData['bets_away']]
            );
        }

        return redirect()->route('bets.index')->with('success', 'Apuestas creadas o actualizadas exitosamente.');
    }  */


    public function store(Request $request, $quinielaId)
    {
        // Valida los datos del formulario
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'game_id' => 'required|exists:games,id',
            'bets_home' => 'required|integer',
            'bets_away' => 'required|integer',
        ]);

        // Crea una nueva apuesta
        $bet = new Bet;
        $bet->user_id = $validatedData['user_id'];
        $bet->game_id = $validatedData['game_id'];
        $bet->bets_home = $validatedData['bets_home'];
        $bet->bets_away = $validatedData['bets_away'];
        $bet->points = 0; // Por defecto, los puntos están en 0
        $bet->quiniela_id = $quinielaId; // Asigna el ID de la quiniela

        // Guarda la nueva apuesta
        $bet->save();

        // Actualiza el total de apuestas en la quiniela
        $quiniela = Quiniela::findOrFail($quinielaId);
        $quiniela->total += 1;
        $quiniela->save();

        // Redirecciona a alguna vista o realiza alguna acción después de guardar la apuesta
    }



    /* public function store(StoreBetRequest $request)
    {
        $userId = auth()->id();

        foreach ($request->bets as $betData) {
            // Verificar si ya existe una apuesta para este usuario y juego
            $existingBet = Bet::where('game_id', $betData['game_id'])
                            ->where('user_id', $userId)
                            ->first();

            if ($existingBet) {
                // Devolver un mensaje de error si ya existe una apuesta
                return redirect()->route('bets.index')->with('error', 'Ya has realizado una apuesta para este juego.');
            }

            // Crear una nueva apuesta si no existe
            Bet::create([
                'game_id' => $betData['game_id'],
                'user_id' => $userId,
                'bets_home' => $betData['bets_home'],
                'bets_away' => $betData['bets_away']
            ]);
        }

        return redirect()->route('bets.index')->with('success', 'Apuestas creadas exitosamente.');
    }
 */



    /**
     * Display the specified resource.
     */
    /* public function show(Bet $bet)
    {
        $userId = auth()->id();
        $bets = Bet::with(['game.homeTeam', 'game.awayTeam'])->where('user_id', $userId)->get();

        return view('bets.show', compact('bets'));
    } */

    public function show($id)
    {
        // Obtener una apuesta específica con el usuario y el juego relacionados
        $bet = Bet::with(['user', 'game.quiniela', 'game.homeTeam', 'game.awayTeam'])->findOrFail($id);

        // Retornar una vista con los datos
        return view('bets.show', compact('bet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bet = Bet::with(['game.homeTeam', 'game.awayTeam'])->findOrFail($id);
        return view('bets.edit', compact('bet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bets_home' => 'required|integer',
            'bets_away' => 'required|integer',
        ]);
    
        $bet = Bet::findOrFail($id);
        $bet->bets_home = $request->input('bets_home');
        $bet->bets_away = $request->input('bets_away');
        $bet->save();
    
        return redirect()->route('bets.index')->with('success', 'Apuesta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bet $bet)
    {
        $bet->delete();
        return redirect()->route('bets.index')->with('success', 'bets eliminada exitosamente.');
    }
}
