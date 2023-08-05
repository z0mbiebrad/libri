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
        Schema::create('wishlist_books', function (Blueprint $table) {
            $table->id();
            $table->ulid();
            $table->text('thumbnail')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('authors')->nullable();
            $table->string('categories')->nullable();
            $table->string('rating')->nullable();
            $table->string('published_date')->nullable();
            $table->text('description')->nullable();
            $table->string('publisher')->nullable();
            $table->timestamps();

            $table->unique('title', 'authors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_books');
    }
};
