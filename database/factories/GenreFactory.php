<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info',
        'light', 'dark'];

        return [
            'name' => $this->faker->name(),
            'style' => $styles[array_rand($styles)]
        ];
    }
}
