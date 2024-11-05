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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });
    }


    // 
/*
    $table->unsignedBigInteger('post_id');
    $table->foreign('post_id')->references('id')->on('posts');
    === 2 lines above = line below so it can be replaced at table design.
    $table->foreignId('post_id')->constrained('posts')->references('id');
    ===
    $table->foreignId('post_id')->constrained('posts');

*/
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
