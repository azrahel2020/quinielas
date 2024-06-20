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

            'date' => '2024-06-20 04:00:00',
            'stadium' => 'monumental',
            'quiniela_id' => 1,
            'home_team_id' => 1,
            'away_team_id' => 2,

        ]);
        Game::create([

            'date' => '2024-06-20 05:00:00',
            'stadium' => 'centenario',
            'quiniela_id' => 1,
            'home_team_id' => 3,
            'away_team_id' => 4,

        ]);
        Game::create([

            'date' => '2024-06-20 15:00:00',
            'stadium' => 'maracana',
            'quiniela_id' => 1,
            'home_team_id' => 5,
            'away_team_id' => 6,

        ]);

        Game::create([

            'date' => '2024-06-20 04:00:00',
            'stadium' => 'monumental',
            'quiniela_id' => 2,
            'home_team_id' => 17,
            'away_team_id' => 18,

        ]);
        Game::create([

            'date' => '2024-06-20 05:00:00',
            'stadium' => 'centenario',
            'quiniela_id' => 2,
            'home_team_id' => 19,
            'away_team_id' => 20,

        ]);
        Game::create([

            'date' => '2024-06-20 15:00:00',
            'stadium' => 'maracana',
            'quiniela_id' => 2,
            'home_team_id' => 17,
            'away_team_id' => 20,

        ]);
    }
}
