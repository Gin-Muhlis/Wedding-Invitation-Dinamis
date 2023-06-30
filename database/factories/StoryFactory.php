<?php

namespace Database\Factories;

use App\Models\Story;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'story_date' => $this->faker->date,
            'story_image' => $this->faker->text(255),
            'story_title' => $this->faker->text(255),
            'content' => $this->faker->text,
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
