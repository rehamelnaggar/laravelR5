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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('clientName', 100);
            $table->string('phone', 25);
            $table->string('email', 100);
            $table->string('website', 100);
<<<<<<< HEAD
            $table->boolean('active');
            $table->string('image', 100);
            $table->foreignId('city_id')->constrained('cities');
=======
            $table->string('city', 30);
            $table->boolean('active');
            $table->string('image', 100);
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};