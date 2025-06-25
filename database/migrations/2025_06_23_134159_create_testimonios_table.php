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
        Schema::create('testimonios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('empresa');
            $table->string('cargo');
            $table->tinyInteger('calificacion'); // de 1 a 5
            $table->text('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonios');
    }
};
