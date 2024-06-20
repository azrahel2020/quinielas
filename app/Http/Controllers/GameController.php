<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\Quiniela;
use App\Models\Team;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($quinielaId)
    {
        // Obtener la quiniela por su ID
        $quiniela = Quiniela::findOrFail($quinielaId);
        
        // Obtener todos los juegos asociados a esta quiniela
        $games = Game::with(['homeTeam', 'awayTeam'])
                     ->where('quiniela_id', $quinielaId)
                     ->get();
        
        // Retornar la vista con los juegos
        return view('admin.games.index', compact('quiniela', 'games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($quinielaId)
    {
        $quinielas = Quiniela::all();
        $teams = Team::all();
        $games = Game::with(['homeTeam', 'awayTeam'])
                    ->where('quiniela_id', $quinielaId)
                    ->get();
        return view('admin.games.create', compact('quinielas', 'teams', 'quinielaId', 'games'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        // Validar y guardar la imagen
        $imageName = 'default.png';
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('games', 'public');
        }

        // Crear el juego
        Game::create([
            'quiniela_id' => $request->quiniela_id,
            'home_team_id' => $request->home_team_id,
            'away_team_id' => $request->away_team_id,
            'date' => $request->date,
            'stadium' => $request->stadium,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.games.index', ['quinielaId' => $request->quiniela_id])
                         ->with('success', 'Juego creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($gameId)
    {
        $game = Game::findOrFail($gameId);
        $teams = Team::all(); // Obtener todos los equipos disponibles
        return view('admin.games.edit', compact('game', 'teams'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, $gameId)
    {
        $game = Game::findOrFail($gameId);

        // Actualizar los datos del juego
        $game->home_team_id = $request->home_team_id;
        $game->away_team_id = $request->away_team_id;
        $game->date = $request->date;
        $game->stadium = $request->stadium;
        $game->save();

        return redirect()->route('admin.games.index', ['quinielaId' => $game->quiniela_id])
                         ->with('success', 'Juego actualizado exitosamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $quinielaId = $game->quiniela_id; // Obtener el ID de la quiniela asociada al juego
        $game->delete();
        return redirect()->route('admin.games.index', ['quinielaId' => $quinielaId])->with('success', 'El juego ha sido eliminado exitosamente.');
    }

    /* public function gamesWithResults()
    {
        // Obtener todos los juegos con resultados
        $games = Game::has('result')->with('homeTeam', 'awayTeam', 'result')->get();
        
        // Retornar la vista con los datos
        return view('admin.games.gamesWithResults', compact('games'));
    } */
}
