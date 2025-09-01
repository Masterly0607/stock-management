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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->foreignId('province_id')->nullable()->constrained()->nullOnDelete(); # ->nullOnDelete() = if the related province is deleted → don’t delete the district, instead set its province_id = NULL. 
            # foreignId('province_id') = Creates a column province_id (BIGINT UNSIGNED). This column is used to reference a provinces.id.
            # ->constrained() = Sets up a foreign key constraint. By default, it references id column in provinces table (because of the name province_id).
            $table->foreignId('district_id')->nullable()->constrained()->nullOnDelete();
            $table->string('address')->nullable(); # the exact location details (street number, building, landmark).
            $table->string('phone', 20)->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['province_id', 'district_id', 'address']); # Prevents entering two branches with the same address inside the same district. But allows same address string in different districts/provinces (because that’s common in real life).
       
        });
        # Add a branch_id column to the users table (if it doesn’t already exist). This column links each user to a branch. If the branch gets deleted, the user stays but their branch_id becomes NULL.”
            Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'branch_id')) {
                $table->foreignId('branch_id')->nullable()->after('id')->constrained('branches')->nullOnDelete(); 
            } # nullOnDelete();  = If a branch is deleted, set users.branch_id to NULL (don’t delete the user).
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'branch_id')) {
                $table->dropConstrainedForeignId('branch_id');
            }
        });
        Schema::dropIfExists('branches');
    }
};
