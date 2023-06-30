<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Testimony;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestimonyTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_testimonies_list()
    {
        $testimonies = Testimony::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.testimonies.index'));

        $response->assertOk()->assertSee($testimonies[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_testimony()
    {
        $data = Testimony::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.testimonies.store'), $data);

        $this->assertDatabaseHas('testimonies', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_testimony()
    {
        $testimony = Testimony::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'image' => $this->faker->text(255),
            'rating' => $this->faker->randomNumber(0),
            'review' => $this->faker->text,
        ];

        $response = $this->putJson(
            route('api.testimonies.update', $testimony),
            $data
        );

        $data['id'] = $testimony->id;

        $this->assertDatabaseHas('testimonies', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_testimony()
    {
        $testimony = Testimony::factory()->create();

        $response = $this->deleteJson(
            route('api.testimonies.destroy', $testimony)
        );

        $this->assertModelMissing($testimony);

        $response->assertNoContent();
    }
}
