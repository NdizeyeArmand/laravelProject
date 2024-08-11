<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        $publishedAt = $this->faker->dateTimeThisYear();
        return [
            'user_id' => User::factory(),
            'title' => rtrim($this->faker->sentence(), '.'),
            'subheading' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(6, true),
            'cover_image' => 'img/Obsidian-image.jpg',
            'published_at' => $publishedAt,
            'created_at' => $publishedAt,
            'updated_at' => $publishedAt,
        ];
    }
}
