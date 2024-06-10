<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
        Student::factory(20)->create();
=======
        Student::factory()->count(7)->create();
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
    }

}