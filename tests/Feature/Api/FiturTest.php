<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Fitur;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FiturTest extends TestCase
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
    public function it_gets_fiturs_list()
    {
        $fiturs = Fitur::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.fiturs.index'));

        $response->assertOk()->assertSee($fiturs[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_fitur()
    {
        $data = Fitur::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.fiturs.store'), $data);

        $this->assertDatabaseHas('fiturs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_fitur()
    {
        $fitur = Fitur::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'icon' => $this->faker->text(255),
        ];

        $response = $this->putJson(route('api.fiturs.update', $fitur), $data);

        $data['id'] = $fitur->id;

        $this->assertDatabaseHas('fiturs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_fitur()
    {
        $fitur = Fitur::factory()->create();

        $response = $this->deleteJson(route('api.fiturs.destroy', $fitur));

        $this->assertModelMissing($fitur);

        $response->assertNoContent();
    }
}
