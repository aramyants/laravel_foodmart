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
            $table->string('name'); // Product name
            $table->text('description'); // Product description
            $table->decimal('price', 8, 2); // Product price
            $table->integer('quantity'); // Quantity in stock
            $table->string('sku')->unique(); // Stock keeping unit
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->boolean('is_active')->default(true); // Status
            $table->date('release_date')->nullable(); // Release date
            $table->string('image')->nullable(); // Image path
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
