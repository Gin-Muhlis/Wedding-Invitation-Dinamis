<?php

namespace Database\Factories;

use App\Models\Catgory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatgoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Catgory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->text(255),
            'price' => $this->faker->randomNumber,
        ];
    }
}
