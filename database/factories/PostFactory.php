<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    protected $model = Post::class;

    public function definition(): array
    {
        return [
        'title'       => $this->faker->sentence(nbWords: 6, variableNbWords: true),
        'text'        => $this->faker->paragraph(3, true),
        // relación con category y user
        'category_id' => Category::all()->random()->id,
        'user_id'     => User::all()->random()->id,
    ];
    }
}
