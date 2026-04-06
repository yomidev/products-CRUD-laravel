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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();//Primary Key
            $table->string('phone_number');
            $table->foreignId('id_customer')->constrained('customers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();//Fechas de actualización o creación de registro
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
