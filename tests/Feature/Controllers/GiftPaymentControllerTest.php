<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\GiftPayment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GiftPaymentControllerTest extends TestCase
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
    public function it_displays_index_view_with_gift_payments()
    {
        $giftPayments = GiftPayment::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('gift-payments.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.gift_payments.index')
            ->assertViewHas('giftPayments');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_gift_payment()
    {
        $response = $this->get(route('gift-payments.create'));

        $response->assertOk()->assertViewIs('Admin.app.gift_payments.create');
    }

    /**
     * @test
     */
    public function it_stores_the_gift_payment()
    {
        $data = GiftPayment::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('gift-payments.store'), $data);

        unset($data['icon']);

        $this->assertDatabaseHas('gift_payments', $data);

        $giftPayment = GiftPayment::latest('id')->first();

        $response->assertRedirect(route('gift-payments.edit', $giftPayment));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_gift_payment()
    {
        $giftPayment = GiftPayment::factory()->create();

        $response = $this->get(route('gift-payments.show', $giftPayment));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.gift_payments.show')
            ->assertViewHas('giftPayment');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_gift_payment()
    {
        $giftPayment = GiftPayment::factory()->create();

        $response = $this->get(route('gift-payments.edit', $giftPayment));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.gift_payments.edit')
            ->assertViewHas('giftPayment');
    }

    /**
     * @test
     */
    public function it_updates_the_gift_payment()
    {
        $giftPayment = GiftPayment::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'icon' => $this->faker->text(255),
        ];

        $response = $this->put(
            route('gift-payments.update', $giftPayment),
            $data
        );

        unset($data['icon']);

        $data['id'] = $giftPayment->id;

        $this->assertDatabaseHas('gift_payments', $data);

        $response->assertRedirect(route('gift-payments.edit', $giftPayment));
    }

    /**
     * @test
     */
    public function it_deletes_the_gift_payment()
    {
        $giftPayment = GiftPayment::factory()->create();

        $response = $this->delete(route('gift-payments.destroy', $giftPayment));

        $response->assertRedirect(route('gift-payments.index'));

        $this->assertModelMissing($giftPayment);
    }
}
