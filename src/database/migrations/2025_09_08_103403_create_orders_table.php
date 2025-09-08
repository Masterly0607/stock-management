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
       Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('branch_id')->constrained();
    $table->foreignId('distributor_id')->nullable()->constrained();
    $table->string('order_no')->unique();
    $table->enum('status', ['draft','paid','posted','cancelled'])->default('draft');
    $table->dateTime('ordered_at')->nullable();
    $table->decimal('total', 12, 2)->default(0);
    $table->decimal('paid_amount', 12, 2)->default(0);
    $table->timestamps();
    $table->index(['branch_id','status','ordered_at']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
