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
        // Schema::create('user', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('login');
        //     $table->string('email');
        //     $table->string('password');
        //     $table->integer('role');
        // });

        // Schema::create('category', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->binary('image');
        // });

        // Schema::create('test', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('description');
        //     $table->integer('id_category');          
        //     $table->integer('id_user');            
        //     $table->integer('number_passes');
        //     $table->boolean('activity');

        //     $table->foreign('id_category')->references('id')->on('category');
        //     $table->foreign('id_user')->references('id')->on('user');
        // });

        // Schema::create('table_object', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_test');
        //     $table->string('name');
        //     $table->string('description');
        //     $table->binary('image');

        //     $table->foreign('id_test')->references('id')->on('test');
        // });

        // Schema::create('notification', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_test');
        //     $table->integer('id_user_sender');
        //     $table->integer('id_user_recipient');
        //     $table->string('message');

        //     $table->foreign('id_test')->references('id')->on('test');
        //     $table->foreign('id_user_sender')->references('id')->on('user');
        //     $table->foreign('id_user_recipient')->references('id')->on('user');
        // });

        // Schema::create('passed_test', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_test');
        //     $table->integer('id_user');
        //     $table->date('date');
        //     $table->string('comment');
        //     $table->integer('score');
        //     $table->boolean('status');

        //     $table->foreign('id_test')->references('id')->on('test');
        //     $table->foreign('id_user')->references('id')->on('user');
        // });

        // Schema::create('result', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('id_passed_test');
        //     $table->integer('id_table_object');
        //     $table->integer('count');

        //     $table->foreign('id_passed_test')->references('id')->on('passed_test');
        //     $table->foreign('id_table_object')->references('id')->on('table_object');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
