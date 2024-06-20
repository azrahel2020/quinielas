<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('admin.teams.create', compact('teams'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {

        $existingTeam = Team::where('name', $request->name)->first();

        if ($existingTeam) {
            return redirect()->back()->with('error', '¡El equipo ya existe!');
        }

        if ($request->hasFile('image')) {
            $imageName = $request->name.'.'.$request->image->extension();  
            $request->image->move(public_path('img/teams'), $imageName);
        } else {
            
            $imageName = 'default.png'; 
        }

        Team::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.teams.index')->with('success', 'Equipo creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
{
    // Obtener el nombre de la imagen actual
    $imageName = $team->image;

    if ($request->hasFile('image')) {
        // Si se carga una nueva imagen, guardarla y actualizar el nombre de la imagen
        $imageName = $request->name.'.'.$request->image->extension();  
        $request->image->move(public_path('img/teams'), $imageName);
    }

    // Actualizar los datos del equipo, incluyendo el nombre de la imagen
    $team->update([
        'name' => $request->name,
        'image' => $imageName,
    ]);

    return redirect()->route('admin.teams.index')->with('success', 'Equipo actualizado exitosamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        if ($team->image) {
            if (file_exists(public_path('img/' . $team->image))) {
                unlink(public_path('img/' . $team->image));
            }
        }
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'team eliminada exitosamente.');
    }
}
