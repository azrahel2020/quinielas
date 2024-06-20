<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([

            'name' => 'Argentina',
            'image' => 'argentina.png',

        ]);
        Team::create([

            'name' => 'Peru',
            'image' => 'peru.png',

        ]);
        Team::create([

            'name' => 'Chile',
            'image' => 'chile.png',

        ]);
        Team::create([

            'name' => 'Canada',
            'image' => 'canada.png',

        ]);
        Team::create([

            'name' => 'Mexico',
            'image' => 'mexico.png',

        ]);

        Team::create([

            'name' => 'Ecuador',
            'image' => 'ecuador.png',

        ]);
        Team::create([

            'name' => 'Venezuela',
            'image' => 'venezuela.png',

        ]);
        Team::create([

            'name' => 'Jamaica',
            'image' => 'jamaica.png',

        ]);
        Team::create([

            'name' => 'Estados Unidos',
            'image' => 'eua.png',

        ]);
        Team::create([

            'name' => 'Uruguay',
            'image' => 'uruguay.png',

        ]);
        Team::create([

            'name' => 'Panama',
            'image' => 'panama.png',

        ]);
        Team::create([

            'name' => 'Bolivia',
            'image' => 'bolivia.png',

        ]);
        Team::create([

            'name' => 'Brasil',
            'image' => 'brasil.png',

        ]);
        Team::create([

            'name' => 'Colombia',
            'image' => 'colombia.png',

        ]);
        Team::create([

            'name' => 'Paraguay',
            'image' => 'paraguay.png',

        ]);
        Team::create([

            'name' => 'Costa Rica',
            'image' => 'costarica.png',

        ]);

        Team::create([

            'name' => 'Real Madrid',
            'image' => 'realmadrid.png',

        ]);
        Team::create([

            'name' => 'Barcelona',
            'image' => 'barcelona.png',

        ]);
        Team::create([

            'name' => 'Valencia',
            'image' => 'valencia.png',

        ]);
        Team::create([

            'name' => 'Getafe',
            'image' => 'getafe.png',

        ]);
    }
}
