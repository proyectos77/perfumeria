<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('token_seguimiento', 80)->nullable()->unique()->after('id');
            $table->timestamp('visto_admin_at')->nullable()->after('medio_pago');
        });
    }

    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn(['token_seguimiento', 'visto_admin_at']);
        });
    }
};
