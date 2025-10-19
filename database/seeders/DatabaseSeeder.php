<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PostTag;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // إنشاء المستخدمين يدويًا
        $users = [
            [
                'fullname' => 'Chef Tasty',
                'username' => 'ChefTasty',
                'email' => 'cheftasty@example.com',
                'is_admin' => true,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Foodie Fan',
                'username' => 'FoodieFan',
                'email' => 'foodiefan@example.com',
                'is_admin' => false,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Gourmet Guru',
                'username' => 'GourmetGuru',
                'email' => 'gourmetguru@example.com',
                'is_admin' => false,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Baking Boss',
                'username' => 'BakingBoss',
                'email' => 'bakingboss@example.com',
                'is_admin' => false,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Spicy Spoon',
                'username' => 'SpicySpoon',
                'email' => 'spicyspoon@example.com',
                'is_admin' => false,
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }

        // إنشاء الفئات يدويًا (كل الفئات من CategoryFactory)
        $categories = [
            ['name' => 'Appetizers'],
            ['name' => 'Main Dishes'],
            ['name' => 'Desserts'],
            ['name' => 'Beverages'],
            ['name' => 'Breakfast'],
            ['name' => 'Vegan'],
            ['name' => 'Gluten-Free'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                [
                    'name' => $category['name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // إنشاء العلامات يدويًا (كل العلامات من TagFactory)
        $tags = [
            ['name' => 'Vegetarian'],
            ['name' => 'Spicy'],
            ['name' => 'Quick'],
            ['name' => 'Healthy'],
            ['name' => 'Dessert'],
            ['name' => 'Savory'],
            ['name' => 'Gluten-Free'],
            ['name' => 'Vegan'],
            ['name' => 'Italian'],
            ['name' => 'Mexican'],
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate(
                ['name' => $tag['name']],
                [
                    'name' => $tag['name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // إنشاء المنشورات يدويًا (كل العناوين من PostFactory)
        $posts = [
            [
                'user_id' => User::where('email', 'cheftasty@example.com')->first()->id,
                'category_id' => Category::where('name', 'Desserts')->first()->id,
                'title' => 'Classic Chocolate Chip Cookies',
                'ingredients' => json_encode([
                    'Flour' => '2 cups',
                    'Sugar' => '1 cup',
                    'Butter' => '1 stick',
                    'Eggs' => '2',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '6 people',
                'prep_time' => '15 minutes',
                'cook_time' => '20 minutes',
                'image' => '/img/food/ClassicChocolateChipCookies.jpeg',
                'reading_time' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'foodiefan@example.com')->first()->id,
                'category_id' => Category::where('name', 'Main Dishes')->first()->id,
                'title' => 'Spicy Thai Noodle Salad',
                'ingredients' => json_encode([
                    'Noodles' => '200g',
                    'Chili Sauce' => '2 tbsp',
                    'Peanuts' => '1/4 cup',
                    'Cilantro' => '1 handful',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '4 people',
                'prep_time' => '10 minutes',
                'cook_time' => '10 minutes',
                'image' => '/img/food/SpicyThaiNoodleSalad.jpeg',
                'reading_time' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'gourmetguru@example.com')->first()->id,
                'category_id' => Category::where('name', 'Main Dishes')->first()->id,
                'title' => 'Creamy Garlic Butter Chicken',
                'ingredients' => json_encode([
                    'Chicken Breast' => '4 pieces',
                    'Garlic' => '3 cloves',
                    'Cream' => '1 cup',
                    'Parmesan' => '1/2 cup',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '4 people',
                'prep_time' => '15 minutes',
                'cook_time' => '30 minutes',
                'image' => '/img/food/CreamyGarlicButterChicken.jpeg',
                'reading_time' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'bakingboss@example.com')->first()->id,
                'category_id' => Category::where('name', 'Breakfast')->first()->id,
                'title' => 'Vegan Avocado Toast',
                'ingredients' => json_encode([
                    'Avocado' => '1',
                    'Bread' => '2 slices',
                    'Lemon Juice' => '1 tbsp',
                    'Tomato' => '1',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '2 people',
                'prep_time' => '10 minutes',
                'cook_time' => '5 minutes',
                'image' => '/img/food/VeganAvocadoToast.jpeg',
                'reading_time' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'spicyspoon@example.com')->first()->id,
                'category_id' => Category::where('name', 'Main Dishes')->first()->id,
                'title' => 'Homemade Pizza Margherita',
                'ingredients' => json_encode([
                    'Pizza Dough' => '1 ball',
                    'Tomato Sauce' => '1/2 cup',
                    'Mozzarella' => '1 cup',
                    'Basil' => '10 leaves',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '4 people',
                'prep_time' => '20 minutes',
                'cook_time' => '15 minutes',
                'image' => '/img/food/HomemadePizzaMargherita.jpeg',
                'reading_time' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'cheftasty@example.com')->first()->id,
                'category_id' => Category::where('name', 'Desserts')->first()->id,
                'title' => 'Lemon Blueberry Muffins',
                'ingredients' => json_encode([
                    'Flour' => '2 cups',
                    'Sugar' => '1 cup',
                    'Blueberries' => '1 cup',
                    'Lemon Zest' => '1 tbsp',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '8 people',
                'prep_time' => '15 minutes',
                'cook_time' => '25 minutes',
                'image' => '/img/food/LemonBlueberryMuffins.jpeg',
                'reading_time' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'foodiefan@example.com')->first()->id,
                'category_id' => Category::where('name', 'Main Dishes')->first()->id,
                'title' => 'Grilled Salmon with Herb Sauce',
                'ingredients' => json_encode([
                    'Salmon Fillets' => '4 pieces',
                    'Olive Oil' => '2 tbsp',
                    'Herbs' => '1 tbsp',
                    'Lemon Juice' => '1 tbsp',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '4 people',
                'prep_time' => '10 minutes',
                'cook_time' => '15 minutes',
                'image' => '/img/food/GrilledSalmonwithHerbSauce.jpeg',
                'reading_time' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'gourmetguru@example.com')->first()->id,
                'category_id' => Category::where('name', 'Main Dishes')->first()->id,
                'title' => 'Spaghetti Carbonara',
                'ingredients' => json_encode([
                    'Spaghetti' => '200g',
                    'Eggs' => '2',
                    'Pancetta' => '100g',
                    'Parmesan' => '1/2 cup',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '4 people',
                'prep_time' => '10 minutes',
                'cook_time' => '20 minutes',
                'image' => '/img/food/SpaghettiCarbonara.jpeg',
                'reading_time' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'bakingboss@example.com')->first()->id,
                'category_id' => Category::where('name', 'Beverages')->first()->id,
                'title' => 'Mango Smoothie Bowl',
                'ingredients' => json_encode([
                    'Mango' => '2 cups',
                    'Yogurt' => '1 cup',
                    'Honey' => '1 tbsp',
                    'Granola' => '1/4 cup',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '2 people',
                'prep_time' => '10 minutes',
                'cook_time' => '0 minutes',
                'image' => '/img/food/MangoSmoothieBowl.jpeg',
                'reading_time' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'spicyspoon@example.com')->first()->id,
                'category_id' => Category::where('name', 'Main Dishes')->first()->id,
                'title' => 'Stuffed Bell Peppers',
                'ingredients' => json_encode([
                    'Bell Peppers' => '4',
                    'Rice' => '1 cup',
                    'Ground Beef' => '500g',
                    'Tomato Sauce' => '1/2 cup',
                ]),
                'directions' => json_encode([
                    'Preheat oven to 350°F. Mix dry ingredients in a bowl.',
                    'Combine wet ingredients separately, then mix with dry.',
                    'Bake for 20 minutes or until golden brown.',
                    'Let cool before serving.',
                ]),
                'serves' => '4 people',
                'prep_time' => '20 minutes',
                'cook_time' => '40 minutes',
                'image' => '/img/food/StuffedBellPeppers.jpeg',
                'reading_time' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // إنشاء التعليقات يدويًا (كل التعليقات من CommentFactory)
        $comments = [
            [
                'user_id' => User::where('email', 'cheftasty@example.com')->first()->id,
                'post_id' => Post::where('title', 'Classic Chocolate Chip Cookies')->first()->id,
                'content' => 'This recipe was amazing! So easy to follow.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'foodiefan@example.com')->first()->id,
                'post_id' => Post::where('title', 'Spicy Thai Noodle Salad')->first()->id,
                'content' => 'Loved the flavors, but I added extra garlic.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'gourmetguru@example.com')->first()->id,
                'post_id' => Post::where('title', 'Creamy Garlic Butter Chicken')->first()->id,
                'content' => 'Perfect for a quick weeknight dinner!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'bakingboss@example.com')->first()->id,
                'post_id' => Post::where('title', 'Vegan Avocado Toast')->first()->id,
                'content' => 'The texture was great, but it took longer to cook.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => User::where('email', 'spicyspoon@example.com')->first()->id,
                'post_id' => Post::where('title', 'Homemade Pizza Margherita')->first()->id,
                'content' => 'My family loved this, will make again!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($comments as $comment) {
            Comment::create($comment);
        }

        // إنشاء علاقات المنشورات والعلامات يدويًا
        $postTags = [
            [
                'post_id' => Post::where('title', 'Classic Chocolate Chip Cookies')->first()->id,
                'tag_id' => Tag::where('name', 'Dessert')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Spicy Thai Noodle Salad')->first()->id,
                'tag_id' => Tag::where('name', 'Spicy')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Spicy Thai Noodle Salad')->first()->id,
                'tag_id' => Tag::where('name', 'Healthy')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Creamy Garlic Butter Chicken')->first()->id,
                'tag_id' => Tag::where('name', 'Savory')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Vegan Avocado Toast')->first()->id,
                'tag_id' => Tag::where('name', 'Vegan')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Homemade Pizza Margherita')->first()->id,
                'tag_id' => Tag::where('name', 'Italian')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Lemon Blueberry Muffins')->first()->id,
                'tag_id' => Tag::where('name', 'Dessert')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Grilled Salmon with Herb Sauce')->first()->id,
                'tag_id' => Tag::where('name', 'Healthy')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Spaghetti Carbonara')->first()->id,
                'tag_id' => Tag::where('name', 'Italian')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Mango Smoothie Bowl')->first()->id,
                'tag_id' => Tag::where('name', 'Healthy')->first()->id,
            ],
            [
                'post_id' => Post::where('title', 'Stuffed Bell Peppers')->first()->id,
                'tag_id' => Tag::where('name', 'Savory')->first()->id,
            ],
        ];

        foreach ($postTags as $postTag) {
            PostTag::create($postTag);
        }
    }
}