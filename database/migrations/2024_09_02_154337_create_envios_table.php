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
        Schema::create('envios', function (Blueprint $table) {
            $table->id();
            $table->string('origen');
            $table->string('destinatario');
            $table->string('peso')->unique();
            $table->string('alto');
            $table->string('ancho');
            $table->string('profundidad');
            $table->string('volumen');
            $table->string('costo');
            $table->longText('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
