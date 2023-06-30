<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quote' => $this->faker->text,
            'surat' => $this->faker->text(255),
            'wedding_data_id' => \App\Models\WeddingData::factory(),
        ];
    }
}
