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

        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('category_id');          
            $table->unsignedBigInteger('user_id');            
            $table->integer('number_passes');
            $table->boolean('activity');
            $table->timestamps();        
 
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('test', function(Blueprint $table) {
        //     $table->renameColumn('categories_id', 'category_id');
        // });
        Schema::dropIfExists('test');
    }
};
