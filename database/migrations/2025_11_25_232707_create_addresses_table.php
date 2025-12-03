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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            // Llave foránea hacia users
            $table->foreignId('user_id')
                  ->constrained()          // references 'id' on 'users'
                  ->onDelete('cascade');   // si se borra el user, se borra la address

            $table->string('codigo')->unique();//campo que pidio el profesor

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
