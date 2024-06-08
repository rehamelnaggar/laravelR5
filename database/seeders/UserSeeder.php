<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the user already exists before creating
        if (!User::where('email', 'reem@example.com')->exists()) {
            User::factory()->create([
                'name' => 'reem',
                'email' => 'reem@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Un123456'),
                'remember_token' => Str::random(10),
            ]);
        } else {
            $this->command->info('User with email reem@example.com already exists. Skipping...');
        }
    }
}