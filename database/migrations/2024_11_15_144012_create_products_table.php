<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->decimal('price', 8, 2);
            $table->string('image');
            $table->text('description');
            $table->date('expiry_date')->nullable();  // Expiry date of the product
            $table->date('manufacturing_date'); // Manufacturing date of the product
            $table->string('category'); // You can add a category for the product
            $table->integer('stock_quantity'); // Quantity of the product in stock
            $table->decimal('discount', 5, 2)->nullable(); // Discount if applicable
            $table->string('sku')->unique(); // SKU for the product (stock keeping unit)
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
