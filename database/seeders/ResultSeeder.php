<?php

namespace Database\Seeders;

use App\Models\Result;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Result::create([

            'game_id' => 1,
            'result_home' => 0,
            'result_away' => 0,
            

        ]);
        Result::create([

            'game_id' => 2,
            'result_home' => 2,
            'result_away' => 0,
            

        ]);
        
    }
}
