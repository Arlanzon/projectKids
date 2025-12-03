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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Llave foránea al post
            $table->foreignId('post_id')
                  ->constrained('posts')
                  ->onDelete('cascade'); // si se borra el post, se borran sus comentarios
                
            $table->foreignId('user_id')
                 ->constrained()
                 ->onDelete('cascade');

                  
            $table->text('text'); // Campo de texto del comentario

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commeents');
    }
};
