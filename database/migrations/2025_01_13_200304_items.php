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
            $table->float('weight');
            $table->string('goods_type');
            $table->string('inventory_name');
            $table->date('purchase_date');
            $table->string('partner_name');
            $table->string('supplier_name');
            $table->string('payment_type');
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('dollar_rate', 10, 2);
            $table->decimal('dollar_value', 10, 2);
            $table->string('ton_price');
            $table->timestamps();
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
