<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Website::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'website_name' => $this->faker->text(255),
            'website_logo' => $this->faker->text(255),
            'email' => $this->faker->email,
            'whatsapp_number' => $this->faker->text(255),
            'address' => $this->faker->text(255),
            'link_instagram' => $this->faker->text(255),
            'link_fb' => $this->faker->text(255),
            'link_twitter' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];
    }
}
