<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\WeddingData;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeddingDataControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_wedding_data()
    {
        $allWeddingData = WeddingData::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-wedding-data.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.all_wedding_data.index')
            ->assertViewHas('allWeddingData');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_wedding_data()
    {
        $response = $this->get(route('all-wedding-data.create'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.all_wedding_data.create');
    }

    /**
     * @test
     */
    public function it_stores_the_wedding_data()
    {
        $data = WeddingData::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-wedding-data.store'), $data);

        unset($data['giff_address']);

        $this->assertDatabaseHas('wedding_data', $data);

        $weddingData = WeddingData::latest('id')->first();

        $response->assertRedirect(route('all-wedding-data.edit', $weddingData));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_wedding_data()
    {
        $weddingData = WeddingData::factory()->create();

        $response = $this->get(route('all-wedding-data.show', $weddingData));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.all_wedding_data.show')
            ->assertViewHas('weddingData');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_wedding_data()
    {
        $weddingData = WeddingData::factory()->create();

        $response = $this->get(route('all-wedding-data.edit', $weddingData));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.all_wedding_data.edit')
            ->assertViewHas('weddingData');
    }

    /**
     * @test
     */
    public function it_updates_the_wedding_data()
    {
        $weddingData = WeddingData::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'male_image' => $this->faker->text(255),
            'female_image' => $this->faker->text(255),
            'wedding_coordinate' => $this->faker->text(255),
            'greeting' => $this->faker->text,
            'giff_address' => $this->faker->text(255),
            'order_id' => $order->id,
        ];

        $response = $this->put(
            route('all-wedding-data.update', $weddingData),
            $data
        );

        unset($data['giff_address']);

        $data['id'] = $weddingData->id;

        $this->assertDatabaseHas('wedding_data', $data);

        $response->assertRedirect(route('all-wedding-data.edit', $weddingData));
    }

    /**
     * @test
     */
    public function it_deletes_the_wedding_data()
    {
        $weddingData = WeddingData::factory()->create();

        $response = $this->delete(
            route('all-wedding-data.destroy', $weddingData)
        );

        $response->assertRedirect(route('all-wedding-data.index'));

        $this->assertModelMissing($weddingData);
    }
}
