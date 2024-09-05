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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('merchant_id');
            $table->timestamp('schedule')->nullable();
            $table->enum('status', ['pending', 'process', 'completed', 'canceled'])->default('pending')->nullable();
            $table->text('reason')->nullable();
            $table->integer('total')->nullable();
            $table->integer('payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
