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
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category')->default(0);
            $table->foreign('id_category')->references('id_category')->on('category')->onDelete('cascade');
            $table->string('title', 50);
            $table->string('author', 25);
            $table->string('description', 500);
            $table->integer('quantity');
            $table->string('file');
            $table->string('cover');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
