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
        Schema::create('workers', function (Blueprint $table) {
            $table->string('name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('middle_last_name');
            $table->string('email');
            $table->string('numbre_phone');
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas')->onDelete('cascade');
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
