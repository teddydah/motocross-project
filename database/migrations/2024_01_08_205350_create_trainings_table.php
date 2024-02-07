<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du circuit
            $table->enum('run', ['adult', 'kid']); // Type de série
            $table->integer('max_people'); // Nb max de pilotes inscrits
            $table->enum('vehicle', ['moto'])->default('Moto'); // Véhicule autorisé
            $table->enum('license_type', ['ufolep', 'ffm']);
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->string('address');
            $table->string('zip_code', 5);
            $table->string('city');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
