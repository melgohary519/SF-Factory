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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->float('weight'); // Weight
            $table->string('goods_type'); // Goods Type
            $table->date('purchase_date'); // Purchase Date
            $table->string('partner_name'); // Partner Name
            $table->string('supplier_name'); // Supplier Name
            $table->string('payment_type'); // Payment Type
            $table->decimal('purchase_price', 10, 2); // Purchase Price
            $table->decimal('dollar_rate', 10, 2); // Dollar Rate
            $table->decimal('dollar_value', 10, 2); // Dollar Value
            $table->timestamps(); // Created at and Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
