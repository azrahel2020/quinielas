<?php

namespace Database\Seeders;

use App\Models\Quiniela;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuinielaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiniela::create([

            'name' => 'Copa America',
            'inicio' => '2024-06-24',
            'final' => '2024-06-25',
            'image' => 'copa america.jpg',
            'status' => 'Activa',

        ]);
        Quiniela::create([

            'name' => 'Eurocopa',
            'inicio' => '2024-06-24',
            'final' => '2024-06-25',
            'image' => 'Eurocopa.jpg',
            'status' => 'Activa',

        ]);
        
    }
}
