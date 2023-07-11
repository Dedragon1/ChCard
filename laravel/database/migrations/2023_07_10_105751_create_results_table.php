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
        Schema::create('result', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passed_test_id');
            $table->unsignedBigInteger('table_object_id');
            $table->integer('count');
            $table->timestamps();

            $table->foreign('passed_test_id')->references('id')->on('passed_test');
            $table->foreign('table_object_id')->references('id')->on('table_object');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
