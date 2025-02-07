<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('smartphones', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('marque');
            $table->text('description');
            $table->decimal('prix', 10, 2); // Prix avec plus de précision
            $table->string('photo')->nullable(); // Photo nullable
            $table->string('ram');
            $table->string('rom');
            $table->string('ecran');
            $table->string('couleurs_disponibles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smartphones');
    }
};
