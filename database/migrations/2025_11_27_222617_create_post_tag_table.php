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
             // Llaves foráneas
            $table->foreignId('post_id')
                ->constrained()              // por defecto referencia a 'posts'
                ->onDelete('cascade');

            $table->foreignId('tag_id')
                ->constrained()              // por defecto referencia a 'tags'
                ->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
