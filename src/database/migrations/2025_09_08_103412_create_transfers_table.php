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
     Schema::create('transfers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('from_branch_id')->constrained('branches');
    $table->foreignId('to_branch_id')->constrained('branches');
    $table->string('transfer_no')->unique();
    $table->enum('status', ['draft','sent','received','cancelled'])->default('draft');
    $table->dateTime('transferred_at')->nullable();
    $table->string('notes')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
