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
            $table->uuid('id')->primary();
            $table->string('origen');
            $table->string('destinatario');
            $table->string('peso');
            $table->string('alto');
            $table->string('ancho');
            $table->string('profundidad');
            $table->decimal('volumen', 10, 2);
            $table->string('costo');
            $table->longText('descripcion');
            $table->timestamps();
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
