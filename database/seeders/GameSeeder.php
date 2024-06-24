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
            'home_team_id' => 14,
            'away_team_id' => 15,

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
            'home_team_id' => 2,
            'away_team_id' => 4,

        ]);
        Game::create([

            'date' => '2024-06-25 20:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 1,
            'home_team_id' => 3,
            'away_team_id' => 1,

        ]);

        //eurocopa
        Game::create([

            'date' => '2024-06-24 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 23,
            'away_team_id' => 24,

        ]);
        Game::create([

            'date' => '2024-06-24 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 25,
            'away_team_id' => 26,

        ]);






        /* Game::create([

            'date' => '2024-06-22 17:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 1,
            'home_team_id' => 6,
            'away_team_id' => 7,

        ]);
        Game::create([

            'date' => '2024-06-22 20:00:00',
            'stadium' => 'NRG stadium',
            'quiniela_id' => 1,
            'home_team_id' => 5,
            'away_team_id' => 8,

        ]);
        Game::create([

            'date' => '2024-06-23 17:00:00',
            'stadium' => 'At & T stadium',
            'quiniela_id' => 1,
            'home_team_id' => 9,
            'away_team_id' => 12,

        ]);
        Game::create([

            'date' => '2024-06-23 20:00:00',
            'stadium' => 'hard Rock stadium',
            'quiniela_id' => 1,
            'home_team_id' => 10,
            'away_team_id' => 11,

        ]);
        Game::create([

            'date' => '2024-06-24 17:00:00',
            'stadium' => 'hard Rock stadium',
            'quiniela_id' => 1,
            'home_team_id' => 14,
            'away_team_id' => 15,

        ]);
        Game::create([

            'date' => '2024-06-24 20:00:00',
            'stadium' => 'hard Rock stadium',
            'quiniela_id' => 1,
            'home_team_id' => 13,
            'away_team_id' => 16,

        ]);

        //eurocopa
        Game::create([

            'date' => '2024-06-22 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 17,
            'away_team_id' => 18,

        ]);
        Game::create([

            'date' => '2024-06-23 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 19,
            'away_team_id' => 20,

        ]);
        Game::create([

            'date' => '2024-06-23 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 21,
            'away_team_id' => 22,

        ]);
        Game::create([

            'date' => '2024-06-24 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 23,
            'away_team_id' => 24,

        ]);
        Game::create([

            'date' => '2024-06-24 14:00:00',
            'stadium' => 'Levis Stadium',
            'quiniela_id' => 2,
            'home_team_id' => 25,
            'away_team_id' => 26,

        ]); */

        
    }
}
