<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'ip_address' => $this->faker->ipv4,
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
