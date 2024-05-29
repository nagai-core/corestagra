<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "comment" => $this->faker->realText(20,5),
            "user_id" => $this->faker->numberBetween(1,5),
            "images_id" => $this->faker->numberBetween(1,5),
        ];
    }
}
