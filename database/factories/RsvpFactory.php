<?php

namespace Database\Factories;

use App\Models\Rsvp;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RsvpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rsvp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'comment' => $this->faker->text,
            'kehadiran' => 'hadir',
            'bg_profile' => $this->faker->text(255),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
