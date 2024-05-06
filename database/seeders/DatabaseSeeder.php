<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // bikin admin
        User::factory()->create([
            'name' => 'adminkece',
            'email' => 'admin@gmail.com',
            'phone' => '081262753984',
            'address' => 'inti bumi',
            'roles' => 'ADMIN',
            'password' => 'adminkece',
        ]);
    }
}
