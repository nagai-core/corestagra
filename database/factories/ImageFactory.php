<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "url" => "images/test.jpg",
            "comment" => $this->faker->realText(20,5),
            "favorite" => $this->faker->numberBetween(1,100),
            "user_id" => $this->faker->numberBetween(1,5),
        ];
    }
}
