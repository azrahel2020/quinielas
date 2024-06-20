<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name' => 'Admin',
            'email' => 'admin@copa.com',
            'password' => bcrypt('123456'),
            'phone' => 123456789,
            'image' => 'default.png',
            'is_admin' => 1,
            'points' => 0,

        ]);
        User::create([

            'name' => 'juana',
            'email' => 'juana@copa.com',
            'password' => bcrypt('123456'),
            'phone' => 123456789,
            'image' => 'default.png',
            'is_admin' => 0,
            'points' => 0,

        ]);
        User::create([

            'name' => 'pedro',
            'email' => 'pedro@copa.com',
            'password' => bcrypt('123456'),
            'phone' => 123456789,
            'image' => 'default.png',
            'is_admin' => 0,
            'points' => 0,

        ]);
    }
}
