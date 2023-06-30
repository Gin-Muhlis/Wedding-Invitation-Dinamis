<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Theme;
use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThemeOrdersTest extends TestCase
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
    public function it_gets_theme_orders()
    {
        $theme = Theme::factory()->create();
        $orders = Order::factory()
            ->count(2)
            ->create([
                'theme_id' => $theme->id,
            ]);

        $response = $this->getJson(route('api.themes.orders.index', $theme));

        $response->assertOk()->assertSee($orders[0]->no_order);
    }

    /**
     * @test
     */
    public function it_stores_the_theme_orders()
    {
        $theme = Theme::factory()->create();
        $data = Order::factory()
            ->make([
                'theme_id' => $theme->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.themes.orders.store', $theme),
            $data
        );

        $this->assertDatabaseHas('orders', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $order = Order::latest('id')->first();

        $this->assertEquals($theme->id, $order->theme_id);
    }
}
