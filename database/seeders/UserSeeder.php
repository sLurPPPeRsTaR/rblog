<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Raymond',
            'username' => 'JaguarPaw',
            'email' => 'monsherr@hotmail.com',
            'password' => Hash::make('password123'),
        ]);

        User::factory(5)->create();
    }
}
