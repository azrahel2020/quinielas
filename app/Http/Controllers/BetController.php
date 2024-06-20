<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBetRequest;
use App\Http\Requests\UpdateBetRequest;
use App\Models\Bet;
use App\Models\Game;
use App\Models\Quiniela;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    
    public function index($quinielaId)
    {
        // Obtener la quiniela con los juegos asociados
        $quiniela = Quiniela::with('games')->findOrFail($quinielaId);

        // Obtener todos los juegos asociados a la quiniela
        $games = $quiniela->games;

        // Obtener las apuestas asociadas a los juegos
        $bets = Bet::whereIn('game_id', $games->pluck('id'))->get();

        // Retornar la vista con los datos
        return view('admin.bets.index', compact('games', 'quiniela', 'bets', 'quinielaId'));
    }

    public function store(StoreBetRequest $request, $quinielaId)
    {
        // Obtener el user_id del request
        $userId = $request->input('user_id');

        // Validar los datos del formulario
        $validatedData = $request->validated();

        // Iterar sobre cada apuesta recibida y guardarla en la base de datos
        foreach ($validatedData['bets'] as $gameId => $betData) {
            $bet = new Bet();
            $bet->user_id = auth()->user()->id;
            $bet->game_id = $gameId;
            $bet->bets_home = $betData['bets_home'];
            $bet->bets_away = $betData['bets_away'];
            $bet->save();
        }

        // Redireccionar a la página deseada después de guardar las apuestas
        return redirect()->route('admin.bets.index', ['quinielaId' => $quinielaId])
                        ->with('success', 'Las apuestas se han guardado correctamente.');
    }

    public function show($id)
    {
        // Obtener la apuesta por su ID
        $bet = Bet::findOrFail($id);

        // Verificar si el usuario autenticado tiene permiso para ver esta apuesta (opcional)

        // Pasar la apuesta a la vista
        return view('admin.bets.show', compact('bet'));
    }

    public function edit($id)
    {
        // Obtener la apuesta por su ID
        $bet = Bet::findOrFail($id);

        // Verificar si el usuario autenticado tiene permiso para editar esta apuesta (opcional)

        // Pasar la apuesta a la vista de edición
        return view('admin.bets.edit', compact('bet'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'bets_home' => 'required|integer|min:0',
            'bets_away' => 'required|integer|min:0',
        ]);

        // Obtener la apuesta por su ID
        $bet = Bet::findOrFail($id);

        // Verificar si el usuario autenticado tiene permiso para actualizar esta apuesta (opcional)

        // Actualizar los datos de la apuesta
        $bet->update([
            'bets_home' => $validatedData['bets_home'],
            'bets_away' => $validatedData['bets_away'],
        ]);

        // Redireccionar a donde desees después de actualizar la apuesta
        return redirect()->route('admin.bets.index')->with('success', 'Apuesta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Obtener la apuesta por su ID
        $bet = Bet::findOrFail($id);

        // Verificar si el usuario autenticado tiene permiso para eliminar esta apuesta (opcional)

        // Eliminar la apuesta
        $bet->delete();

        // Redireccionar a donde desees después de eliminar la apuesta
        return redirect()->route('admin.bets.index')->with('success', 'Apuesta eliminada exitosamente.');
    }



   /*  public function showBetForm()
    {
        $quinielas = Quiniela::with('games')->get();

        return view('bets.create', compact('quinielas'));
    } */

    /* public function storeBetsForQuinielas(Request $request)
    {
        $user = Auth::user();
        $quinielas = Quiniela::all();
        $bets = [];

        foreach ($quinielas as $quiniela) {
            foreach ($quiniela->games as $game) {
                $bet = Bet::create([
                    'user_id' => $user->id,
                    'game_id' => $game->id,
                    'bets_home' => $request->input('bets_home')[$game->id] ?? 0,
                    'bets_away' => $request->input('bets_away')[$game->id] ?? 0,
                    'points' => 0 // o algún cálculo que necesites
                ]);
                $bets[] = $bet;
            }
        }

        return view('bets', ['bets' => $bets]);
    } */
}
