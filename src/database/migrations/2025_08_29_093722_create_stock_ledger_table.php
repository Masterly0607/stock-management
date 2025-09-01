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
        # Stock ledger = Records every IN / OUT movement with ref (purchase, sale, transfer, adjustment, stock count). Records every IN / OUT movement with ref (purchase, sale, transfer, adjustment, stock count). If you want history of all movements, you read the ledger.
        Schema::create('stock_ledger', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('ref_type');  // purchase,sale,transfer_out,transfer_in,count,adjustment
            $table->unsignedBigInteger('ref_id');
            $table->unsignedInteger('qty_in')->default(0);
            $table->unsignedInteger('qty_out')->default(0);
            $table->decimal('unit_cost', 12, 2)->nullable();
            $table->timestamp('occurred_at')->index();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_ledger');
    }
};
