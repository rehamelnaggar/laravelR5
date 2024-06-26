<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'clientName' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->url(),
            'city_id' => $this->faker->numberBetween(1, 20),
            'address' => $this->faker->address(),
            'active' => $this->faker->numberbetween(0, 1),

            'clientName' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,

            'address' => $this->faker->address,
            'active' => $this->faker->boolean(80),
            'image' => $this->faker->image('public/assets/images', 640, 480, null, false),
        ];
    
    }
}