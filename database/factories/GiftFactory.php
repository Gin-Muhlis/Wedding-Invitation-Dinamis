<?php

namespace Database\Factories;

use App\Models\Gift;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GiftFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gift::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner_name' => $this->faker->text(255),
            'no_data' => $this->faker->randomNumber,
            'order_id' => \App\Models\Order::factory(),
            'gift_payment_id' => \App\Models\GiftPayment::factory(),
        ];
    }
}
