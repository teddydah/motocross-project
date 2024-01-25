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
            $table->integer('max_people')->nullable(); // Nb max de pilotes inscrits
            $table->enum('track', ['MX', 'kid']); // Type de piste
            $table->enum('vehicle', ['Moto'])->default('Moto'); // Véhicule autorisé
            $table->string('license_type')->nullable(); // UFOLEP et/ou FFM
            $table->enum('price', [10, 15])->default(15);
            // 10€ par mois (pilotes du club) | 15€ par mois (pilotes extérieurs)
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->string('nature_of_land')->nullable(); // Nature du terrain
            $table->string('address');
            $table->string('zip_code', 5);
            $table->string('city', 50);
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
