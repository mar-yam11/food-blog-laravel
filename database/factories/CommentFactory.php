<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition()
    {
        $comments = [
            'This recipe was amazing! So easy to follow.',
            'Loved the flavors, but I added extra garlic.',
            'Perfect for a quick weeknight dinner!',
            'The texture was great, but it took longer to cook.',
            'My family loved this, will make again!'
        ];

        return [
            'post_id' => \App\Models\Post::factory(),
            'user_id' => \App\Models\User::factory(),
            'content' => $this->faker->randomElement($comments),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}