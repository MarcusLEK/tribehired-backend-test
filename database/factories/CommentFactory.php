<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function configure()
    {
        return $this->afterCreating(function (Comment $comment) {
            $comment->post->total_number_of_comments++;
            $comment->post->save();
        });
    }
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_id' => Post::inRandomOrder()->first(),
            'name' => fake()->name(),
            'email' => fake()->email(),
            'body' => fake()->text(),
        ];
    }
}
