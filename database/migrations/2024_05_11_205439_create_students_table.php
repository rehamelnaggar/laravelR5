<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('studentName', 100);
=======
            $table->string('studentName',100);
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
            $table->integer('age');
            $table->boolean('active');
            $table->string('image', 100);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};