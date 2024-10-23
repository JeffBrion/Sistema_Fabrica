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
        Schema::create('planilladetalle', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('totalpayment', 8,2);
            $table->foreignId('id_planillas')->constrained('planillas')->onDelete('cascade');
            $table->foreignId('id_production')->constrained('productions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planilladetalle');
    }
};
