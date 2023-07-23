<?php

namespace Database\Factories;

use App\Models\ReplyRsvp;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyRsvpFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReplyRsvp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'reply' => $this->faker->text,
            'kehadiran' => 'hadir',
            'bg_profile' => $this->faker->text(255),
            'rsvp_id' => \App\Models\Rsvp::factory(),
        ];
    }
}
