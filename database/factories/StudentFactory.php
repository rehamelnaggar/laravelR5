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
<<<<<<< HEAD
            'studentName' => $this->faker->name(),
            'age' => $this->faker->number(),
            'active' => $this->faker->numberbetween(0, 1),
=======
            'studentName' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 25),
            'active' => $this->faker->boolean,
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
            'image' => $this->faker->image('public/assets/images', 640, 480, null, false),
        ];
    }
}