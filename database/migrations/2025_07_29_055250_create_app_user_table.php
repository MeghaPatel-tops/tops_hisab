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
        Schema::create('appuser', function (Blueprint $table) {
            $table->id('uid');
            $table->string('username');
            $table->string('email');
            $table->bigInteger('contact');
            $table->string('password');
            $table->string('profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appuser');
    }
};
