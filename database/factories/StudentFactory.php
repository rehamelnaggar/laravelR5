<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'studentName' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 25),
            'active' => $this->faker->boolean,
            'image' => 'default.png',
        ];
    }
}