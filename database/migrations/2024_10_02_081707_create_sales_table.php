<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->decimal('quantity', 8, 2);
            $table->decimal('unit_cost', 8, 2);
            $table->decimal('profit_margin', 5, 2);
            $table->decimal('shipping_cost', 8, 2);
            $table->decimal('total_cost', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};