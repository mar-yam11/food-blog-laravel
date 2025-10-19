<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class PostFactory extends Factory
{
    public function definition()
    {
        $recipeTitles = [
            'Classic Chocolate Chip Cookies', 'Spicy Thai Noodle Salad', 'Creamy Garlic Butter Chicken',
            'Vegan Avocado Toast', 'Homemade Pizza Margherita', 'Lemon Blueberry Muffins',
            'Grilled Salmon with Herb Sauce', 'Spaghetti Carbonara', 'Mango Smoothie Bowl',
            'Stuffed Bell Peppers'
        ];

        $ingredients = [
            ['Flour' => '2 cups', 'Sugar' => '1 cup', 'Butter' => '1 stick', 'Eggs' => '2'],
            ['Noodles' => '200g', 'Chili Sauce' => '2 tbsp', 'Peanuts' => '1/4 cup', 'Cilantro' => '1 handful'],
            ['Chicken Breast' => '4 pieces', 'Garlic' => '3 cloves', 'Cream' => '1 cup', 'Parmesan' => '1/2 cup'],
            ['Avocado' => '1', 'Bread' => '2 slices', 'Lemon Juice' => '1 tbsp', 'Tomato' => '1'],
            ['Pizza Dough' => '1 ball', 'Tomato Sauce' => '1/2 cup', 'Mozzarella' => '1 cup', 'Basil' => '10 leaves'],
        ];

        $directions = [
            'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
            'Combine wet ingredients separately, then mix with dry.',
            'Bake for 20 minutes or until golden brown.',
            'Let cool before serving.'
        ];

        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => Category::all()->random()->id,
            'title' => $this->faker->randomElement($recipeTitles),
            'ingredients' => json_encode($this->faker->randomElement($ingredients)),
            'directions' => json_encode($directions),
            'serves' => $this->faker->numberBetween(2, 8) . ' people',
            'prep_time' => $this->faker->numberBetween(10, 60) . ' minutes',
            'cook_time' => $this->faker->numberBetween(15, 120) . ' minutes',
            'image' => $this->faker->imageUrl(640, 480, 'food'),
            'reading_time' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}