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
            Post::COLUMN_TEXT => $this->generateText(),
            Post::COLUMN_STATUS => Status::ENABLED
        ];
    }

    /**
     * @param $text
     * @return string
     */
    protected function generateParagraph($text) :string
    {
        return  '<p>'.$text.'</p>';
    }

    /**
     * @return string
     */
    protected function generateText() :string
    {
        $text = '';
        $paragraphs = $this->faker->paragraphs(rand(3,6));
        foreach($paragraphs as $paragraph) {
            $text .=  $this->generateParagraph($paragraph);
        }

        return $text;
    }
}
