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
            $table->text('thumbnail');
            $table->string('title');
            $table->string('subtitle');
            $table->string('authors');
            $table->string('categories');
            $table->string('rating');
            $table->string('published_date');
            $table->text('description');
            $table->string('publisher');
            $table->timestamps();

            $table->unique('title', 'authors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
