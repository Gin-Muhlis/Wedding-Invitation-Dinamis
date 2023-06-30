<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\InvitedGuest;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvitedGuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InvitedGuest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
