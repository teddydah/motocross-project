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
            $table->integer('max_people'); // Nb max de pilotes inscrits
            $table->enum('track', ['MX', 'Enfant']); // Type de piste
            $table->enum('vehicle', ['Moto']); // Véhicule autorisé
            $table->enum('license_type', ['UFOLEP', 'FFM'])->nullable();

            // TODO: revoir
            $table->float('price');
            // 10€ par mois (pour les pilotes du club).
            // 15€ par mois (pour les pilotes extérieurs).

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
