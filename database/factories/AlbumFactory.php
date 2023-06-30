<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->text(255),
            'order_id' => \App\Models\Order::factory(),
        ];
    }
}
