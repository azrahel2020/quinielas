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

            'name' => 'copa america',
            'inicio' => '2024-06-20',
            'final' => '2024-06-20',
            'image' => 'default.png',
            'status' => 'Activa',

        ]);
        Quiniela::create([

            'name' => 'liga española',
            'inicio' => '2024-06-20',
            'final' => '2024-06-20',
            'image' => 'default.png',
            'status' => 'Activa',

        ]);
        Quiniela::create([

            'name' => 'liga francesa',
            'inicio' => '2024-06-20',
            'final' => '2024-06-20',
            'image' => 'default.png',
            'status' => 'Activa',

        ]);
        Quiniela::create([

            'name' => ' mundial',
            'inicio' => '2024-06-20',
            'final' => '2024-06-20',
            'image' => 'default.png',
            'status' => 'Activa',

        ]);
    }
}
