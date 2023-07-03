<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Gift;

use App\Models\Order;
use App\Models\GiftPayment;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GiftTest extends TestCase
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
    public function it_gets_gifts_list()
    {
        $gifts = Gift::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.gifts.index'));

        $response->assertOk()->assertSee($gifts[0]->owner_name);
    }

    /**
     * @test
     */
    public function it_stores_the_gift()
    {
        $data = Gift::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.gifts.store'), $data);

        unset($data['gift_payment_id']);

        $this->assertDatabaseHas('gifts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_gift()
    {
        $gift = Gift::factory()->create();

        $order = Order::factory()->create();
        $giftPayment = GiftPayment::factory()->create();

        $data = [
            'owner_name' => $this->faker->text(255),
            'no_data' => $this->faker->randomNumber,
            'order_id' => $order->id,
            'gift_payment_id' => $giftPayment->id,
        ];

        $response = $this->putJson(route('api.gifts.update', $gift), $data);

        unset($data['gift_payment_id']);

        $data['id'] = $gift->id;

        $this->assertDatabaseHas('gifts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_gift()
    {
        $gift = Gift::factory()->create();

        $response = $this->deleteJson(route('api.gifts.destroy', $gift));

        $this->assertModelMissing($gift);

        $response->assertNoContent();
    }
}
