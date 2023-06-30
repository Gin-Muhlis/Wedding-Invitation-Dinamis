<?php

namespace Database\Factories;

use App\Models\GiftPayment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GiftPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GiftPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'icon' => $this->faker->text(255),
        ];
    }
}
