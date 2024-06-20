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
        Schema::create('quinielas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('inicio');
            $table->date('final');
            $table->string('image')->default('default.png');
            $table->string('status')->default('activa');
            
            
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quinielas');
    }
};
