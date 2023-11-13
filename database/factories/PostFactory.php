<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => Admin::all()->random()->id,
            'title' => $this->faker->unique()->sentence(),
            'excerpt' => $this->faker->text(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'min_to_read' => $this->faker->NumberBetween(1, 10)
        ];
    }
}
