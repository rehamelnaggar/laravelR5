<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        Client::factory(20)->count(11)->create();
=======
        Client::factory()->count(11)->create();
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
    }
}