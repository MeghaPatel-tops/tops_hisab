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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id('set_id')->primary;
            $table->foreignId('trx_id')->references('trx_id')->on('transactions')->onDelete('cascade');
            $table->foreignId('user_id')->references('uid')->on('appuser')->onDelete('cascade');
            $table->foreignId('friend_id')->references('uid')->on('appuser')->onDelete('cascade');
            $table->decimal('set_amount', 10, 2);
            $table->string('currency', 3)->default('INR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
