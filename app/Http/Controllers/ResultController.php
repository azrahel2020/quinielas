<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Game;
use App\Models\Quiniela;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index($quinielaId)
    {
        $quiniela = Quiniela::findOrFail($quinielaId);
        $games = Game::where('quiniela_id', $quinielaId)->with('bets')->get();
        return view('admin.results.index', compact('quiniela', 'games'));
    }

    public function store(StoreResultRequest $request, $quinielaId)
    {
        $results = $request->input('results');
        foreach ($results as $gameId => $result) {
            $data = [];
            
            if (isset($result['result_home'])) {
                $data['result_home'] = $result['result_home'];
            }

            if (isset($result['result_away'])) {
                $data['result_away'] = $result['result_away'];
            }

            // Solo actualizar o crear si hay datos
            if (!empty($data)) {
                Result::updateOrCreate(
                    ['game_id' => $gameId],
                    $data
                );
            }
        }
        return redirect()->route('admin.results.index', ['quinielaId' => $quinielaId])->with('success', 'Resultados guardados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = Result::with(['game.homeTeam', 'game.awayTeam'])->findOrFail($id);
        return view('admin.results.show', compact('result'));
    }

    public function edit($id)
    {
        $result = Result::with(['game.homeTeam', 'game.awayTeam'])->findOrFail($id);
        return view('admin.results.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'result_home' => 'required|integer',
            'result_away' => 'required|integer',
        ]);

        $result = Result::findOrFail($id);
        $result->result_home = $request->input('result_home');
        $result->result_away = $request->input('result_away');
        $result->save();

        return redirect()->route('admin.results.index')->with('success', 'Resultado actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('admin.results.index')->with('success', 'Resultado eliminado exitosamente.');
    }
}
