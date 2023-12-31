<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*         \App\Models\User::factory(5)->create(); */

        $user = User::factory()->create([
            "name" => "Jhon doe",
            "email" => "jhom@gmail.com",
            "password" => bcrypt("12345678")
        ]);
        Listing::factory(7)->create([
            "user_id" => $user->id,
        ]);
    }
}
