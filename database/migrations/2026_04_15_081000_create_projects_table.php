<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('summary');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('project_url')->nullable();
            $table->date('completed_at')->nullable();
            $table->unsignedInteger('display_order')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
