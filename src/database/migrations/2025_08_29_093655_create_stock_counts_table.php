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
        # A stock count is the process of physically counting inventory items in a branch/warehouse and comparing them with the system’s recorded quantities(Stock level). Stores when and where the count happened.
        Schema::create('stock_counts', function (Blueprint $table) {
            $table->id();
             $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
            $table->string('count_no')->unique();
            $table->enum('status', ['draft','posted'])->default('draft');
            # Draft = Means the stock count is still in progress. Staff may be: Walking around the warehouse, counting items., Entering the numbers into the system., Reviewing before confirming. Editable stage → you can still change or correct the counted quantities.
            # Posted = Means the stock count has been finalized and confirmed. System compares counted stock vs recorded stock. If differences are found, it creates stock adjustments automatically (increase/decrease). Locked → cannot edit anymore (only view).
            
            $table->timestamp('counted_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_counts');
    }
};
