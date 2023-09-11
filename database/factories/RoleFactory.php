<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Role::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['admin', 'user', 'writer']),
        ];
    }
}
