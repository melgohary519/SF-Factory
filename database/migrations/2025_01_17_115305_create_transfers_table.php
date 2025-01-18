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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->string('type');
            $table->string('person_type');
            $table->date('transfer_date');
            $table->decimal('amount', 10, 2);
            $table->decimal('dollar_rate', 10, 2);
            $table->decimal('dollar_value', 10, 2);
            $table->integer('person_id');
            $table->string('person_name');
            $table->string('person_address');
            $table->string('person_phone');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
