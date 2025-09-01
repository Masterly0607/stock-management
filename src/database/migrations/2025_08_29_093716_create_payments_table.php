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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
             $table->enum('order_type', ['sale','purchase']);
            $table->unsignedBigInteger('order_id'); // sales_orders.id or purchase_orders.id
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->decimal('amount', 14, 2);
            $table->enum('method', ['cash','bank','card','wallet'])->default('cash');
            $table->string('ref_no')->nullable();
            $table->timestamp('paid_at')->index();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
