<?php

namespace Database\Factories;

use App\Models\Theme;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'theme_name' => $this->faker->name(),
            'theme_code' => $this->faker->text(255),
            'catgory_id' => \App\Models\Catgory::factory(),
        ];
    }
}
