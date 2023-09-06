<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            //Faker methods for each column in the Post table
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'title'=>$this->faker->text(15),
            'excerpt'=>$this->faker->sentence,
            'body'=>$this->faker->paragraph,
            'slug'=>$this->faker->slug(),
            'date_published'=>$this->faker->dateTime,
        ];
    }
}
