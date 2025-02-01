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
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->id();
            $table->float('weight');
            $table->string('goods_type');
            $table->date('sale_date');
            $table->string('partner_name');
            $table->integer('trader_id'); 
            $table->string('trader_name'); 
            $table->string('trader_address'); 
            $table->string('trader_phone'); 
            $table->string('payment_type');
            $table->decimal('sale_price', 10, 2);
            $table->decimal('dollar_rate', 10, 2);
            $table->decimal('dollar_value', 10, 2);
            $table->decimal('shipping_fee', 10, 2);
            $table->decimal('shipping_dollar_rate', 10, 2);
            $table->decimal('shipping_dollar_value', 10, 2);
            $table->string('car_owner_name');
            $table->string('car_type');
            $table->string('ton_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_invoices');
    }
};
