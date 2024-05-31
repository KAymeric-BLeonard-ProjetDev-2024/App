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
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mainFile');
            $table->string('Repo');
            $table->timestamps();
        });

        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('pool')->references('id')->on('pools');
            $table->timestamps();
        });

        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instructions');
            $table->foreignId('quest')->references('id')->on('quests');
            $table->string('file');
            $table->string('path')->nullable();
            $table->string('testScript')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pools');
        Schema::dropIfExists('quests');
        Schema::dropIfExists('exercises');
    }
};
