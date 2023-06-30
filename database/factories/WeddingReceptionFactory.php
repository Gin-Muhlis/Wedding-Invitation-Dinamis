<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\WeddingReception;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeddingReceptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeddingReception::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reception_date' => $this->faker->date,
            'reception_time' => $this->faker->time,
            'reception_place' => $this->faker->text(255),
            'reception_address' => $this->faker->text(255),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
