<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_order' => $this->faker->text(255),
            'order_date' => $this->faker->date,
            'domain' => $this->faker->domainName,
            'total_order' => $this->faker->randomNumber,
            'status' => 'aktif',
            'user_id' => \App\Models\User::factory(),
            'theme_id' => \App\Models\Theme::factory(),
        ];
    }
}
