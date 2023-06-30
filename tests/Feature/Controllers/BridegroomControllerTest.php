<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Bridegroom;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BridegroomControllerTest extends TestCase
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
    public function it_displays_index_view_with_bridegrooms()
    {
        $bridegrooms = Bridegroom::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('bridegrooms.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.bridegrooms.index')
            ->assertViewHas('bridegrooms');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_bridegroom()
    {
        $response = $this->get(route('bridegrooms.create'));

        $response->assertOk()->assertViewIs('Admin.app.bridegrooms.create');
    }

    /**
     * @test
     */
    public function it_stores_the_bridegroom()
    {
        $data = Bridegroom::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('bridegrooms.store'), $data);

        $this->assertDatabaseHas('bridegrooms', $data);

        $bridegroom = Bridegroom::latest('id')->first();

        $response->assertRedirect(route('bridegrooms.edit', $bridegroom));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_bridegroom()
    {
        $bridegroom = Bridegroom::factory()->create();

        $response = $this->get(route('bridegrooms.show', $bridegroom));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.bridegrooms.show')
            ->assertViewHas('bridegroom');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_bridegroom()
    {
        $bridegroom = Bridegroom::factory()->create();

        $response = $this->get(route('bridegrooms.edit', $bridegroom));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.bridegrooms.edit')
            ->assertViewHas('bridegroom');
    }

    /**
     * @test
     */
    public function it_updates_the_bridegroom()
    {
        $bridegroom = Bridegroom::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'male_fullname' => $this->faker->text(255),
            'male_nickname' => $this->faker->text(255),
            'male_mother_name' => $this->faker->text(255),
            'male_father_name' => $this->faker->text(255),
            'female_fullname' => $this->faker->text(255),
            'female_nickname' => $this->faker->text(255),
            'female_mother_name' => $this->faker->text(255),
            'female_father_name' => $this->faker->text(255),
            'order_id' => $order->id,
        ];

        $response = $this->put(route('bridegrooms.update', $bridegroom), $data);

        $data['id'] = $bridegroom->id;

        $this->assertDatabaseHas('bridegrooms', $data);

        $response->assertRedirect(route('bridegrooms.edit', $bridegroom));
    }

    /**
     * @test
     */
    public function it_deletes_the_bridegroom()
    {
        $bridegroom = Bridegroom::factory()->create();

        $response = $this->delete(route('bridegrooms.destroy', $bridegroom));

        $response->assertRedirect(route('bridegrooms.index'));

        $this->assertModelMissing($bridegroom);
    }
}
