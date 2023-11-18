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
        Schema::create('animal_discord_user', function (Blueprint $table) {
            $table->integer('discord_user_id');
            $table->integer('animal_id');
            $table->tinyInteger('hunger')->default(3);
            $table->tinyInteger('amusement')->default(3);
            $table->tinyInteger('sleep')->default(3);
            $table->timestamps();

            $table->unique(['discord_user_id', 'animal_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_discord_user');
    }
};
