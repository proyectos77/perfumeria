<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->decimal('costo_envio', 12, 2)->default(0)->after('precio');
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('nombres')->nullable()->after('id');
            $table->string('apellidos')->nullable()->after('nombres');
            $table->string('telefono')->nullable()->after('apellidos');
            $table->string('correo')->nullable()->after('telefono');
            $table->string('tipo_entrega')->default('recoger_tienda')->after('correo');
            $table->string('direccion')->nullable()->after('tipo_entrega');
            $table->decimal('subtotal', 12, 2)->default(0)->after('direccion');
            $table->decimal('costo_envio', 12, 2)->default(0)->after('subtotal');
            $table->string('medio_pago')->default('pendiente_pasarela')->after('estado');
        });
    }

    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn([
                'nombres',
                'apellidos',
                'telefono',
                'correo',
                'tipo_entrega',
                'direccion',
                'subtotal',
                'costo_envio',
                'medio_pago',
            ]);
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('costo_envio');
        });
    }
};
