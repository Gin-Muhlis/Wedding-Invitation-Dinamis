<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Gift;
use App\Models\GiftPayment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GiftPaymentGiftsTest extends TestCase
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
    public function it_gets_gift_payment_gifts()
    {
        $giftPayment = GiftPayment::factory()->create();
        $gifts = Gift::factory()
            ->count(2)
            ->create([
                'gift_payment_id' => $giftPayment->id,
            ]);

        $response = $this->getJson(
            route('api.gift-payments.gifts.index', $giftPayment)
        );

        $response->assertOk()->assertSee($gifts[0]->owner_name);
    }

    /**
     * @test
     */
    public function it_stores_the_gift_payment_gifts()
    {
        $giftPayment = GiftPayment::factory()->create();
        $data = Gift::factory()
            ->make([
                'gift_payment_id' => $giftPayment->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.gift-payments.gifts.store', $giftPayment),
            $data
        );

        unset($data['gift_payment_id']);

        $this->assertDatabaseHas('gifts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $gift = Gift::latest('id')->first();

        $this->assertEquals($giftPayment->id, $gift->gift_payment_id);
    }
}
