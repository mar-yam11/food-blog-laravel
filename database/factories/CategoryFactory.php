<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        $categories = ['Appetizers', 'Main Dishes', 'Desserts', 'Beverages', 'Breakfast', 'Vegan', 'Gluten-Free'];
        return [
            'name' => $this->faker->randomElement($categories),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}