<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Creamos 100 posts
    $posts = Post::factory(100)->create();

    foreach ($posts as $post) {
        // entre 1 y 5 tags aleatorios por post
        $tagsCount = rand(1, 5);
        $tagIds = Tag::inRandomOrder()
                     ->limit($tagsCount)
                     ->pluck('id');

        $post->tags()->attach($tagIds);
    }
    }
}