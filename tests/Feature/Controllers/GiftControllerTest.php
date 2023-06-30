<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Gift;

use App\Models\Order;
use App\Models\GiftPayment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GiftControllerTest extends TestCase
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
    public function it_displays_index_view_with_gifts()
    {
        $gifts = Gift::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('gifts.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.gifts.index')
            ->assertViewHas('gifts');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_gift()
    {
        $response = $this->get(route('gifts.create'));

        $response->assertOk()->assertViewIs('Admin.app.gifts.create');
    }

    /**
     * @test
     */
    public function it_stores_the_gift()
    {
        $data = Gift::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('gifts.store'), $data);

        $this->assertDatabaseHas('gifts', $data);

        $gift = Gift::latest('id')->first();

        $response->assertRedirect(route('gifts.edit', $gift));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_gift()
    {
        $gift = Gift::factory()->create();

        $response = $this->get(route('gifts.show', $gift));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.gifts.show')
            ->assertViewHas('gift');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_gift()
    {
        $gift = Gift::factory()->create();

        $response = $this->get(route('gifts.edit', $gift));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.gifts.edit')
            ->assertViewHas('gift');
    }

    /**
     * @test
     */
    public function it_updates_the_gift()
    {
        $gift = Gift::factory()->create();

        $giftPayment = GiftPayment::factory()->create();
        $order = Order::factory()->create();

        $data = [
            'owner_name' => $this->faker->text(255),
            'no_data' => $this->faker->randomNumber,
            'gift_payment_id' => $giftPayment->id,
            'order_id' => $order->id,
        ];

        $response = $this->put(route('gifts.update', $gift), $data);

        $data['id'] = $gift->id;

        $this->assertDatabaseHas('gifts', $data);

        $response->assertRedirect(route('gifts.edit', $gift));
    }

    /**
     * @test
     */
    public function it_deletes_the_gift()
    {
        $gift = Gift::factory()->create();

        $response = $this->delete(route('gifts.destroy', $gift));

        $response->assertRedirect(route('gifts.index'));

        $this->assertModelMissing($gift);
    }
}
