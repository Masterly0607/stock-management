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
         Schema::create('purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->decimal('qty', 12, 3);
            $table->decimal('unit_cost', 12, 2);
            $table->decimal('line_total', 12, 2);
            $table->timestamps();
            $table->unique(['purchase_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
