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
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ptag_id')->constrained('ptags');
            $table->morphs('taggable'); //taggable_id , taggable_type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * 
     * $post=App\Models\Post::first()
     * $video=App\Models\Video::first()
     * $ptag=App\Models\Ptag::first()
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};
