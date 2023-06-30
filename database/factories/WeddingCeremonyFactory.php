<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\WeddingCeremony;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeddingCeremonyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WeddingCeremony::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ceremony_date' => $this->faker->date,
            'ceremony_time' => $this->faker->time,
            'ceremony_place' => $this->faker->text(255),
            'ceremony_address' => $this->faker->text(255),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
