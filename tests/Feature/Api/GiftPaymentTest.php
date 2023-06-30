<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\GiftPayment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GiftPaymentTest extends TestCase
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
    public function it_gets_gift_payments_list()
    {
        $giftPayments = GiftPayment::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.gift-payments.index'));

        $response->assertOk()->assertSee($giftPayments[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_gift_payment()
    {
        $data = GiftPayment::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.gift-payments.store'), $data);

        unset($data['icon']);

        $this->assertDatabaseHas('gift_payments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.gift-payments.update', $giftPayment),
            $data
        );

        unset($data['icon']);

        $data['id'] = $giftPayment->id;

        $this->assertDatabaseHas('gift_payments', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_gift_payment()
    {
        $giftPayment = GiftPayment::factory()->create();

        $response = $this->deleteJson(
            route('api.gift-payments.destroy', $giftPayment)
        );

        $this->assertModelMissing($giftPayment);

        $response->assertNoContent();
    }
}
