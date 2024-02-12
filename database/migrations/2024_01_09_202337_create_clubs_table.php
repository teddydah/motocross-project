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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address');
            $table->string('zip_code', 5);
            $table->string('city', 50);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('phone', 10);
            $table->string('email')->unique();
            $table->string('social_network_link');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
