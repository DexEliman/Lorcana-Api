<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Set;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 random users
        User::factory(10)->create();

        // Check if the user brybry already exists
        if (!User::where('email', 'bryan@agence-webup.com')->exists()) {
            // Create the user brybry
            User::factory()->create([
                "email" => "bryan@agence-webup.com",
                "password" => "test",
                "name" => "Brybry",
            ]);
        }

        // Import data from external API
        \Artisan::call('app:import-data');
        
        // Create sets with 100 associated cards
        Set::factory(6)
            ->has(Card::factory()->count(100))
            ->create();
    }
}
