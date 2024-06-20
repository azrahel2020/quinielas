<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuinielaRequest;
use App\Http\Requests\UpdateQuinielaRequest;
use App\Models\Bet;
use App\Models\Game;
use App\Models\Quiniela;
use Illuminate\Support\Facades\Request;

class QuinielaController extends Controller
{
    
    public function index()
    {
        $quinielas = Quiniela::all();
        return view('admin.quinielas.index', compact('quinielas'));
    }


    public function create()
    {
        return view('admin.quinielas.create');
    }

    public function store(StoreQuinielaRequest $request)
    {
        // Verificar si ya existe una quiniela con el mismo nombre
        $existingQuiniela = Quiniela::where('name', $request->name)->first();

        if ($existingQuiniela) {
            return redirect()->back()->withErrors(['name' => '¡La quiniela ya existe!'])->withInput();
        }

        // Manejar la subida de la imagen
        $imageName = 'default.png';
        if ($request->hasFile('image')) {
            $imageName = $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('img/quinielas'), $imageName);
        }

        // Crear la nueva quiniela
        Quiniela::create([
            'name' => $request->name,
            'inicio' => $request->inicio,
            'final' => $request->final,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.quinielas.index')->with('success', 'Quiniela creada exitosamente.');
    }


    public function show($quiniela)
    {
        $quiniela = Quiniela::findOrFail($quiniela);
        $games = $quiniela->games()->with('homeTeam', 'awayTeam')->get();
        return view('admin.quinielas.show', compact('quiniela', 'games'));
    }

    public function edit(Quiniela $quiniela)
    {
        return view('admin.quinielas.edit', compact('quiniela'));
    }

    public function update(UpdateQuinielaRequest $request, Quiniela $quiniela)
    {
        // Verificar si ya existe una quiniela con el mismo nombre
        $existingQuiniela = Quiniela::where('name', $request->name)
            ->where('id', '!=', $quiniela->id)
            ->first();

        if ($existingQuiniela) {
            return redirect()->back()->withErrors(['name' => '¡La quiniela ya existe!'])->withInput();
        }

        // Manejar la subida de la imagen
        if ($request->hasFile('image')) {
            $imageName = $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('img/quinielas'), $imageName);
            $quiniela->image = $imageName; // Actualizar el nombre de la imagen solo si se sube una nueva
        }

        // Actualizar la quiniela
        $quiniela->update([
            'name' => $request->name,
            'inicio' => $request->inicio,
            'final' => $request->final,
            'image' => $quiniela->image,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.quinielas.index')->with('success', 'Quiniela actualizada exitosamente.');
    }

    public function destroy(Quiniela $quiniela)
    {
        
        if ($quiniela->image) {
            if (file_exists(public_path('img/' . $quiniela->image))) {
                unlink(public_path('img/' . $quiniela->image));
            }
        }
        $quiniela->delete();
        return redirect()->route('admin.quinielas.index')->with('success', 'Quiniela eliminada exitosamente.');
        
    }

    
    






    
}
