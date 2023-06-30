<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\WeddingReception;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeddingReceptionControllerTest extends TestCase
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
    public function it_displays_index_view_with_wedding_receptions()
    {
        $weddingReceptions = WeddingReception::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('wedding-receptions.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_receptions.index')
            ->assertViewHas('weddingReceptions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_wedding_reception()
    {
        $response = $this->get(route('wedding-receptions.create'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_receptions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_wedding_reception()
    {
        $data = WeddingReception::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('wedding-receptions.store'), $data);

        $this->assertDatabaseHas('wedding_receptions', $data);

        $weddingReception = WeddingReception::latest('id')->first();

        $response->assertRedirect(
            route('wedding-receptions.edit', $weddingReception)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_wedding_reception()
    {
        $weddingReception = WeddingReception::factory()->create();

        $response = $this->get(
            route('wedding-receptions.show', $weddingReception)
        );

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_receptions.show')
            ->assertViewHas('weddingReception');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_wedding_reception()
    {
        $weddingReception = WeddingReception::factory()->create();

        $response = $this->get(
            route('wedding-receptions.edit', $weddingReception)
        );

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.wedding_receptions.edit')
            ->assertViewHas('weddingReception');
    }

    /**
     * @test
     */
    public function it_updates_the_wedding_reception()
    {
        $weddingReception = WeddingReception::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'reception_date' => $this->faker->date,
            'reception_time' => $this->faker->time,
            'reception_place' => $this->faker->text(255),
            'reception_address' => $this->faker->text(255),
            'order_id' => $order->id,
        ];

        $response = $this->put(
            route('wedding-receptions.update', $weddingReception),
            $data
        );

        $data['id'] = $weddingReception->id;

        $this->assertDatabaseHas('wedding_receptions', $data);

        $response->assertRedirect(
            route('wedding-receptions.edit', $weddingReception)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_wedding_reception()
    {
        $weddingReception = WeddingReception::factory()->create();

        $response = $this->delete(
            route('wedding-receptions.destroy', $weddingReception)
        );

        $response->assertRedirect(route('wedding-receptions.index'));

        $this->assertModelMissing($weddingReception);
    }
}
