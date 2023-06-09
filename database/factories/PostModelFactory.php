<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostModel>
 */
class PostModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 4)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(1),
            // 'body' => '<p>'. implode('</p><p>', $this->faker->paragraphs(mt_rand(4, 8))).'</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(4, 8)))->map(function($p){
                return "<p>$p</p>";
            })->implode(' '),
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 5)
        ];
    }
}
