<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\category;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
            'category_id'=>category::factory(),
            'title'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'intro'=>$this->faker->sentence(),
            'body'=>$this->faker->paragraph(),
            'user_id'=>User::factory()
        ];
    }
}
