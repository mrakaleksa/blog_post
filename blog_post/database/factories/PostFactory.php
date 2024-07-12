<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;
use \App\Models\Category;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'excerpt' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
