<?php

namespace Database\Factories;

use App\Models\WeddingData;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeddingDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeddingData::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'male_image' => $this->faker->text(255),
            'female_image' => $this->faker->text(255),
            'cover_image' => $this->faker->text(255),
            'wedding_coordinate' => $this->faker->text(255),
            'giff_address' => $this->faker->text(255),
            'music' => $this->faker->text(255),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
