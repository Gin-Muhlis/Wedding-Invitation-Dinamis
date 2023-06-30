<?php

namespace Database\Factories;

use App\Models\Testimony;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimony::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->text(255),
            'rating' => $this->faker->randomNumber(0),
            'review' => $this->faker->text,
        ];
    }
}
