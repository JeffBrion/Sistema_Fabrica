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
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('production_id');
            $table->foreign('production_id')->references('id')->on('production')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};