<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => fake()->isbn13(),
            'title' => fake()->text(50),
            'author_id' => fake()->numberBetween(1,20),
            'image_path' => fake()->imageUrl(),
            'publisher' => fake()->company(),
            'category' => fake()->word(),
            'pages'=>fake()->numberBetween(100,250),
            'language' => fake()->languageCode(),
            'publish_date' => fake()->dateTimeBetween('-10 years', 'now'),
            'subjects'=>fake()->word(),
            'desc'=>fake()->text(200)
            //
        ];
    }
}
