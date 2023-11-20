<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Constants\Status;
use App\Models\Card;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Card::COLUMN_NAME =>  $this->faker->sentence(3),
            Card::COLUMN_TEXT => $this->faker->text(500),
            Card::COLUMN_STATUS => Status::ENABLED
        ];
    }
}
