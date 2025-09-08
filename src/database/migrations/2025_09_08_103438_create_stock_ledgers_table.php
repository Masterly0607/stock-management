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
       Schema::create('stock_ledger', function (Blueprint $table) {
    $table->id();
    $table->foreignId('branch_id')->constrained();
    $table->foreignId('product_id')->constrained();
    $table->string('ref_type', 40);  // purchase, order, transfer_in, transfer_out, adjustment, stock_count_post
    $table->unsignedBigInteger('ref_id');
    $table->enum('direction', ['IN','OUT']);
    $table->decimal('qty', 12, 3);
    $table->decimal('unit_cost', 12, 2)->nullable();
    $table->timestamps();
    $table->index(['branch_id','product_id','created_at']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_ledgers');
    }
};
