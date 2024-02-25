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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->integer('distance')->nullable()->default( null );
            $table->integer('delivery_time_economy');
            $table->integer('delivery_time_regular');
            $table->integer('delivery_time_express');
            $table->integer('fee_economy');
            $table->integer('fee_regular');
            $table->integer('fee_express');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
