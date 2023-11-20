<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Constants\Status;

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
    public function definition()
    {
        return [
            Post::COLUMN_NAME => $this->faker->sentence(3),
            Post::COLUMN_TEXT => $this->faker->text(500),
            Post::COLUMN_STATUS => Status::ENABLED
        ];
    }
}
