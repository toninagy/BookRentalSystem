<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Genre;

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
    public function definition()
    {
        $genres = Genre::all()->toArray();
        return [
            'title' => $this->faker->word(),
            'authors' => $this->faker->name(),
            'description' => $this->faker->optional()->sentence(),
            'genres' => $genres[array_rand($genres)]['id'],
            'released_at' => now()->subYears(rand(1, 55)),
            'cover_image' => $this->faker->optional()->sentence(),
            'pages' => random_int(5,5000),
            'language_code' => $this->faker->languageCode(),
            'isbn' => Str::random(13),
            'in_stock' => random_int(0,100)
        ];
    }
}
