<?php

namespace Database\Factories;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commeent>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\Comment>
     */

    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    

    public function definition(): array
    {
        return [
         'text' => fake()->realText(120),
         'user_id' => \App\Models\User::all()->random()->id,
        ];
    }
}
