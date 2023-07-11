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
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('user_sender_id');
            $table->unsignedBigInteger('user_recipient_id');
            $table->string('message');
            $table->timestamps();

            $table->foreign('test_id')->references('id')->on('test');
            $table->foreign('user_sender_id')->references('id')->on('users');
            $table->foreign('user_recipient_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
