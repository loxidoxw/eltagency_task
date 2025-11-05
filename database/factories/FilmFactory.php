<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['show', 'hide']),
            'title_ua' => $this->faker->name(),
            'title_en' => $this->faker->name(),
            'description_ua' => $this->faker->name(),
            'description_en' => $this->faker->name(),
            'poster'=> $this->faker->imageUrl(),
            'trailer_id'=> $this->faker->randomNumber(),
            'release_year'=> $this->faker->year(),
            'start_at'=> fake()->dateTimeBetween('-1 month', '+1 month'),
            'end_at'=> fake()->dateTimeBetween('-1 month', '+1 month')
        ];
    }
}
