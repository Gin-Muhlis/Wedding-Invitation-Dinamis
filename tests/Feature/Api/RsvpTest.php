<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Rsvp;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RsvpTest extends TestCase
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
    public function it_gets_rsvps_list()
    {
        $rsvps = Rsvp::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.rsvps.index'));

        $response->assertOk()->assertSee($rsvps[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_rsvp()
    {
        $data = Rsvp::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.rsvps.store'), $data);

        $this->assertDatabaseHas('rsvps', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_rsvp()
    {
        $rsvp = Rsvp::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'comment' => $this->faker->text,
            'kehadiran' => 'hadir',
            'order_id' => $order->id,
        ];

        $response = $this->putJson(route('api.rsvps.update', $rsvp), $data);

        $data['id'] = $rsvp->id;

        $this->assertDatabaseHas('rsvps', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_rsvp()
    {
        $rsvp = Rsvp::factory()->create();

        $response = $this->deleteJson(route('api.rsvps.destroy', $rsvp));

        $this->assertModelMissing($rsvp);

        $response->assertNoContent();
    }
}
