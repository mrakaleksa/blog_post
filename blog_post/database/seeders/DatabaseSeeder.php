<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        User::truncate();

        $user = User::factory()->create();

        $cat1 = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        $cat2 = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $cat3 = Category::create([
            'name' => 'Fun',
            'slug' => 'fun'
        ]);

        $post1 = Post::create([
            'title' => 'Work Post',
            'excerpt' => 'Work Post excerpt',
            'body' => 'Work Post content',
            'slug' => 'work-post',
            'user_id' => $user->id,
            'category_id' => $cat2->id
        ]);

        $post2 = Post::create([
            'title' => 'Personal Post',
            'excerpt' => 'Personal Post excerpt',
            'body' => 'Personal Post content',
            'slug' => 'personal-post',
            'user_id' => $user->id,
            'category_id' => $cat1->id
        ]);

        $post3 = Post::create([
            'title' => 'Fun Post',
            'excerpt' => 'Fun Post excerpt',
            'body' => 'Fun Post content',
            'slug' => 'fun-post',
            'user_id' => $user->id,
            'category_id' => $cat3->id
        ]);
    }
}
