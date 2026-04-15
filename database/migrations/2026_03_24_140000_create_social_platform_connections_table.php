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
        Schema::create('social_platform_connections', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('provider_user_id');
            $table->string('account_name')->nullable();
            $table->string('account_email')->nullable();
            $table->string('status')->default('connected');
            $table->text('access_token')->nullable();
            $table->text('refresh_token')->nullable();
            $table->timestamp('token_expires_at')->nullable();
            $table->json('scopes')->nullable();
            $table->string('meta_page_id')->nullable();
            $table->string('meta_page_name')->nullable();
            $table->text('meta_page_access_token')->nullable();
            $table->string('meta_instagram_account_id')->nullable();
            $table->string('meta_instagram_username')->nullable();
            $table->longText('payload')->nullable();
            $table->foreignId('connected_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->unique(['platform', 'provider_user_id']);
            $table->index(['platform', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_platform_connections');
    }
};
