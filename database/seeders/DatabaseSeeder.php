<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\City;
use App\Models\Client;
=======
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        
        $this->call(UserSeeder::class);

        User::factory(20)->create();
        City::factory(20)->create();
        Client::factory(20)->create();
=======
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
    }
}
