<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    public function definition()
    {
        $tags = ['Vegetarian', 'Spicy', 'Quick', 'Healthy', 'Dessert', 'Savory', 'Gluten-Free', 'Vegan', 'Italian', 'Mexican'];
        return [
            'name' => $this->faker->randomElement($tags),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}