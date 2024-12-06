<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'login' => 'admin',
            'password' => 'admin',
            'status' => true,
        ]);

        User::create([
            'login' => 'user',
            'password' => 'user',
            'status' => false,
        ]);
    }
}
