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
        Schema::create('user_book', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->default(0);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_book')->default(0);
            $table->foreign('id_book')->references('id')->on('book')->onDelete('cascade');
            $table->boolean('wish')->default(false)->nullable();
            $table->boolean('read')->default(false)->nullable();
            $table->string('review', 500)->nullable();
            $table->string('comment', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_book');
    }
};
