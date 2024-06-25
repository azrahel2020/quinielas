<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Game::create([

            'date' => '2024-06-24 17:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 1,
            'home_team_id' => 2,
            'away_team_id' => 4,

        ]);
        Game::create([

            'date' => '2024-06-24 20:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 1,
            'home_team_id' => 13,
            'away_team_id' => 16,

        ]);
        Game::create([

            'date' => '2024-06-25 17:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 1,
            'home_team_id' => 6,
            'away_team_id' => 8,

        ]);
        Game::create([

            'date' => '2024-06-25 20:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 1,
            'home_team_id' => 7,
            'away_team_id' => 5,

        ]);

        



        
    }
}
