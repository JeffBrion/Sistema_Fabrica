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
        Schema::create('productions', function (Blueprint $table) {
            $table->decimal('payment',8,2)->nullable();
            $table->foreignId('id_workers')->constrained('workers')->onDelete('cascade');
            $table->foreignId('id_products')->constrained('products')->onDelete('cascade');
            $table->date('date');
            $table->integer('total_product');
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
