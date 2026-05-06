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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->string('nombre');
            $table->string('correo');
            $table->integer('calificacion')->min(1)->max(5);
            $table->text('comentario')->nullable();
            $table->boolean('aprobado')->default(false);
            $table->string('ip')->nullable();
            $table->timestamps();
            $table->index('producto_id');
            $table->index('aprobado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificacions');
    }
};
