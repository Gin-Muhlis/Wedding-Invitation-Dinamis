<?php

namespace Database\Factories;

use App\Models\Bridegroom;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BridegroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bridegroom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'male_fullname' => $this->faker->text(255),
            'male_nickname' => $this->faker->text(255),
            'male_mother_name' => $this->faker->text(255),
            'male_father_name' => $this->faker->text(255),
            'female_fullname' => $this->faker->text(255),
            'female_nickname' => $this->faker->text(255),
            'female_mother_name' => $this->faker->text(255),
            'female_father_name' => $this->faker->text(255),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
