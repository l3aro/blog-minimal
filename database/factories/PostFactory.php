<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /** @var PostStatus */
        $postStatus = app(PostStatus::class);
        return [
            'title' => $title = $this->faker->sentence(rand(3, 5)),
            'slug' => Str::slug($title) . '-' . rand(1, 100),
            'description' => $this->faker->paragraphs(rand(5, 15), true),
            'content' => $this->faker->paragraph(rand(10, 20), true),
            'published_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'image' => asset('/assets/images/blog-cover.webp'),
            'status' => $this->faker->randomElement($postStatus->values()),
            'created_by' => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            'created_at' => $this->faker->dateTimeBetween('-2 month', '-1 month'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
