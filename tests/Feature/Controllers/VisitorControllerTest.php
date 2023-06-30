<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Visitor;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitorControllerTest extends TestCase
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
    public function it_displays_index_view_with_visitors()
    {
        $visitors = Visitor::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('visitors.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.visitors.index')
            ->assertViewHas('visitors');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_visitor()
    {
        $response = $this->get(route('visitors.create'));

        $response->assertOk()->assertViewIs('Admin.app.visitors.create');
    }

    /**
     * @test
     */
    public function it_stores_the_visitor()
    {
        $data = Visitor::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('visitors.store'), $data);

        $this->assertDatabaseHas('visitors', $data);

        $visitor = Visitor::latest('id')->first();

        $response->assertRedirect(route('visitors.edit', $visitor));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_visitor()
    {
        $visitor = Visitor::factory()->create();

        $response = $this->get(route('visitors.show', $visitor));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.visitors.show')
            ->assertViewHas('visitor');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_visitor()
    {
        $visitor = Visitor::factory()->create();

        $response = $this->get(route('visitors.edit', $visitor));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.visitors.edit')
            ->assertViewHas('visitor');
    }

    /**
     * @test
     */
    public function it_updates_the_visitor()
    {
        $visitor = Visitor::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'ip_address' => $this->faker->ipv4,
            'order_id' => $order->id,
        ];

        $response = $this->put(route('visitors.update', $visitor), $data);

        $data['id'] = $visitor->id;

        $this->assertDatabaseHas('visitors', $data);

        $response->assertRedirect(route('visitors.edit', $visitor));
    }

    /**
     * @test
     */
    public function it_deletes_the_visitor()
    {
        $visitor = Visitor::factory()->create();

        $response = $this->delete(route('visitors.destroy', $visitor));

        $response->assertRedirect(route('visitors.index'));

        $this->assertModelMissing($visitor);
    }
}
