<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBook>
 */
class UserBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id" => "1",
            "list" => "finished",
            "book_id" => "1",
            "google_book_id" => "d9d9d9d",
            "title" => fake()->name(),
            "authors" => fake()->name(),
            "description" => fake()->paragraph(),
            "categories" => fake()->text(),
            "rating" => "3",
        ];
    }
}
