<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\InvitedGuest;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitedGuestControllerTest extends TestCase
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
    public function it_displays_index_view_with_invited_guests()
    {
        $invitedGuests = InvitedGuest::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('invited-guests.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.invited_guests.index')
            ->assertViewHas('invitedGuests');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_invited_guest()
    {
        $response = $this->get(route('invited-guests.create'));

        $response->assertOk()->assertViewIs('Admin.app.invited_guests.create');
    }

    /**
     * @test
     */
    public function it_stores_the_invited_guest()
    {
        $data = InvitedGuest::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('invited-guests.store'), $data);

        $this->assertDatabaseHas('invited_guests', $data);

        $invitedGuest = InvitedGuest::latest('id')->first();

        $response->assertRedirect(route('invited-guests.edit', $invitedGuest));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_invited_guest()
    {
        $invitedGuest = InvitedGuest::factory()->create();

        $response = $this->get(route('invited-guests.show', $invitedGuest));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.invited_guests.show')
            ->assertViewHas('invitedGuest');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_invited_guest()
    {
        $invitedGuest = InvitedGuest::factory()->create();

        $response = $this->get(route('invited-guests.edit', $invitedGuest));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.invited_guests.edit')
            ->assertViewHas('invitedGuest');
    }

    /**
     * @test
     */
    public function it_updates_the_invited_guest()
    {
        $invitedGuest = InvitedGuest::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'link' => $this->faker->text(255),
            'name' => $this->faker->name(),
            'order_id' => $order->id,
        ];

        $response = $this->put(
            route('invited-guests.update', $invitedGuest),
            $data
        );

        $data['id'] = $invitedGuest->id;

        $this->assertDatabaseHas('invited_guests', $data);

        $response->assertRedirect(route('invited-guests.edit', $invitedGuest));
    }

    /**
     * @test
     */
    public function it_deletes_the_invited_guest()
    {
        $invitedGuest = InvitedGuest::factory()->create();

        $response = $this->delete(
            route('invited-guests.destroy', $invitedGuest)
        );

        $response->assertRedirect(route('invited-guests.index'));

        $this->assertModelMissing($invitedGuest);
    }
}
