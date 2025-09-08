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
        Schema::create('stock_levels', function (Blueprint $table) {
    $table->id();
    $table->foreignId('branch_id')->constrained();
    $table->foreignId('product_id')->constrained();
    $table->decimal('on_hand', 12, 3)->default(0);
    $table->timestamps();
    $table->unique(['branch_id','product_id']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_levels');
    }
};
