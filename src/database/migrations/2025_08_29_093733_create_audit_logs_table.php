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
        Schema::create('audit_logs', function (Blueprint $table) {
              $table->id();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action'); // created, updated, deleted, approved, etc.
            $table->string('target_type'); // Model class
            $table->unsignedBigInteger('target_id');
            $table->json('before_json')->nullable();
            $table->json('after_json')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();

            $table->index(['target_type','target_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
