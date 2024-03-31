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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_compra');
            $table->integer('numero_factura');
            $table->decimal('volumen_galones_factura_corriente', 8, 2);
            $table->decimal('galones_antes_descargue_corriente', 8, 2);
            $table->decimal('galones_despues_descargue_corriente', 8, 2);
            $table->decimal('ventas_realizas_descargue_correinte', 8, 2);
            $table->decimal('volumen_galones_factura_extra', 8, 2);
            $table->decimal('galones_antes_descargue_extra', 8, 2);
            $table->decimal('galones_despues_descargue_extra', 8, 2);
            $table->decimal('ventas_realizas_descargue_extra', 8, 2);
            $table->decimal('volumen_galones_factura_diesel', 8, 2);
            $table->decimal('galones_antes_descargue_diesel', 8, 2);
            $table->decimal('galones_despues_descargue_diesel', 8, 2);
            $table->decimal('ventas_realizas_descargue_diesel', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
