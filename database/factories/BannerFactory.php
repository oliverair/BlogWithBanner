<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Constants\Status;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Banner;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Banner::COLUMN_NAME =>  $this->faker->sentence(3),
            Banner::COLUMN_TEXT => $this->faker->text(500),
            Banner::COLUMN_STATUS => Status::ENABLED,
            Banner::COLUMN_URL => $this->faker->url(),
        ];
    }
}
