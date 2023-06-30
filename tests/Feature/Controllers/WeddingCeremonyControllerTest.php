<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\WeddingCeremony;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeddingCeremonyControllerTest extends TestCase
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
    public function it_displays_index_view_with_wedding_ceremonies()
    {
        $weddingCeremonies = WeddingCeremony::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('wedding-ceremonies.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_ceremonies.index')
            ->assertViewHas('weddingCeremonies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_wedding_ceremony()
    {
        $response = $this->get(route('wedding-ceremonies.create'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_ceremonies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_wedding_ceremony()
    {
        $data = WeddingCeremony::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('wedding-ceremonies.store'), $data);

        $this->assertDatabaseHas('wedding_ceremonies', $data);

        $weddingCeremony = WeddingCeremony::latest('id')->first();

        $response->assertRedirect(
            route('wedding-ceremonies.edit', $weddingCeremony)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_wedding_ceremony()
    {
        $weddingCeremony = WeddingCeremony::factory()->create();

        $response = $this->get(
            route('wedding-ceremonies.show', $weddingCeremony)
        );

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_ceremonies.show')
            ->assertViewHas('weddingCeremony');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_wedding_ceremony()
    {
        $weddingCeremony = WeddingCeremony::factory()->create();

        $response = $this->get(
            route('wedding-ceremonies.edit', $weddingCeremony)
        );

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_ceremonies.edit')
            ->assertViewHas('weddingCeremony');
    }

    /**
     * @test
     */
    public function it_updates_the_wedding_ceremony()
    {
        $weddingCeremony = WeddingCeremony::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'ceremony_date' => $this->faker->date,
            'ceremony_time' => $this->faker->time,
            'ceremony_place' => $this->faker->text(255),
            'ceremony_address' => $this->faker->text(255),
            'order_id' => $order->id,
        ];

        $response = $this->put(
            route('wedding-ceremonies.update', $weddingCeremony),
            $data
        );

        $data['id'] = $weddingCeremony->id;

        $this->assertDatabaseHas('wedding_ceremonies', $data);

        $response->assertRedirect(
            route('wedding-ceremonies.edit', $weddingCeremony)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_wedding_ceremony()
    {
        $weddingCeremony = WeddingCeremony::factory()->create();

        $response = $this->delete(
            route('wedding-ceremonies.destroy', $weddingCeremony)
        );

        $response->assertRedirect(route('wedding-ceremonies.index'));

        $this->assertModelMissing($weddingCeremony);
    }
}
