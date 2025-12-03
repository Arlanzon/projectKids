<?php

namespace Database\Seeders;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $posts = Post::all();

      foreach ($posts as $post) {
        $commentsCount = rand(1, 10);

        Comment::factory($commentsCount)->create([
            'post_id' => $post->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ]);
      }
    }
}
