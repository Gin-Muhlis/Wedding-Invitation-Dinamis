<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Rsvp;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RsvpControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_rsvps()
    {
        $rsvps = Rsvp::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('rsvps.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.rsvps.index')
            ->assertViewHas('rsvps');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_rsvp()
    {
        $response = $this->get(route('rsvps.create'));

        $response->assertOk()->assertViewIs('Admin.app.rsvps.create');
    }

    /**
     * @test
     */
    public function it_stores_the_rsvp()
    {
        $data = Rsvp::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('rsvps.store'), $data);

        $this->assertDatabaseHas('rsvps', $data);

        $rsvp = Rsvp::latest('id')->first();

        $response->assertRedirect(route('rsvps.edit', $rsvp));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_rsvp()
    {
        $rsvp = Rsvp::factory()->create();

        $response = $this->get(route('rsvps.show', $rsvp));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.rsvps.show')
            ->assertViewHas('rsvp');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_rsvp()
    {
        $rsvp = Rsvp::factory()->create();

        $response = $this->get(route('rsvps.edit', $rsvp));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.rsvps.edit')
            ->assertViewHas('rsvp');
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

        $response = $this->put(route('rsvps.update', $rsvp), $data);

        $data['id'] = $rsvp->id;

        $this->assertDatabaseHas('rsvps', $data);

        $response->assertRedirect(route('rsvps.edit', $rsvp));
    }

    /**
     * @test
     */
    public function it_deletes_the_rsvp()
    {
        $rsvp = Rsvp::factory()->create();

        $response = $this->delete(route('rsvps.destroy', $rsvp));

        $response->assertRedirect(route('rsvps.index'));

        $this->assertModelMissing($rsvp);
    }
}
