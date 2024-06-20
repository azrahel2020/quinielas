<?php

namespace Database\Seeders;

use App\Models\Bet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        //apuesta Admin copa america
        Bet::create([

            'user_id' => 1,
            'game_id' => 1,
            'bets_home' => 1,
            'bets_away' => 0,
            'points' => 0,
            

        ]);
        Bet::create([

            'user_id' => 1,
            'game_id' => 2,
            /* 'quiniela_id' => 1, */
            'bets_home' => 2,
            'bets_away' => 0,
            'points' => 0,

        ]);
        Bet::create([

            'user_id' => 1,
            'game_id' => 3,
            /* 'quiniela_id' => 1, */
            'bets_home' => 0,
            'bets_away' => 0,
            'points' => 0,

        ]);

        //apuesta juana copa america
        Bet::create([

            'user_id' => 2,
            'game_id' => 1,
            'bets_home' => 0,
            'bets_away' => 0,
            'points' => 0,
            

        ]);
        Bet::create([

            'user_id' => 2,
            'game_id' => 2,
            'bets_home' => 2,
            'bets_away' => 0,
            'points' => 0,

        ]);
        Bet::create([

            'user_id' => 2,
            'game_id' => 3,
            'bets_home' => 1,
            'bets_away' => 0,
            'points' => 0,

        ]);



        //apuesta Admin liga español
        Bet::create([

            'user_id' => 1,
            'game_id' => 4,
            'bets_home' => 0,
            'bets_away' => 0,
            'points' => 0,
            

        ]);
        Bet::create([

            'user_id' => 1,
            'game_id' => 5,
            'bets_home' => 2,
            'bets_away' => 0,
            'points' => 0,

        ]);
        Bet::create([

            'user_id' => 1,
            'game_id' => 6,
            'bets_home' => 1,
            'bets_away' => 0,
            'points' => 0,

        ]);

        //apuesta juana liga española
        Bet::create([

            'user_id' => 2,
            'game_id' => 4,
            'bets_home' => 1,
            'bets_away' => 0,
            'points' => 0,
            

        ]);
        Bet::create([

            'user_id' => 2,
            'game_id' => 5,
            'bets_home' => 2,
            'bets_away' => 0,
            'points' => 0,

        ]);
        Bet::create([

            'user_id' => 2,
            'game_id' => 6,
            'bets_home' => 1,
            'bets_away' => 0,
            'points' => 0,

        ]);
        
    }
}
