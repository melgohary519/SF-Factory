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
        Schema::create('shipping_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->bigInteger('invoice_number');
            $table->decimal('shipping_fee', 10, 2);
            $table->decimal('shipping_dollar_rate', 10, 2);
            $table->decimal('shipping_dollar_value', 10, 2);
            $table->string('car_owner_name');
            $table->string('car_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_invoices');
    }
};
