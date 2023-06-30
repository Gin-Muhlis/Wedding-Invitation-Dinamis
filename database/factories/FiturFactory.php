<?php

namespace Database\Factories;

use App\Models\Fitur;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FiturFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fitur::class;

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
