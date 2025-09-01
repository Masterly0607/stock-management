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
        Schema::create('products', function (Blueprint $table) {
             $table->id();
            $table->string('sku')->unique(); # unique product code for inventory.
            $table->string('name');
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->nullOnDelete();
            $table->string('unit', 32)->default('pcs');
            $table->decimal('base_price', 12, 2)->nullable();
            $table->unsignedInteger('min_stock')->default(0); # Minimum stock level (for alerts/reorder).
            $table->boolean('is_active')->default(true); # tells the system if the product is currently available for use/sale. Why? 
            # Temporarily hide products = A branch runs out of stock of "Coca Cola 1.5L" but you don’t want to delete it from DB.
            # Seasonal or limited products = Example: "Mooncake" only sold during Pchum Ben. Out of season → is_active = false. During festival → is_active = true.
            # Keep history without deleting = If you delete a product, all past invoices, sales, stock logs would break.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
