<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Album;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumControllerTest extends TestCase
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
    public function it_displays_index_view_with_albums()
    {
        $albums = Album::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('albums.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.albums.index')
            ->assertViewHas('albums');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_album()
    {
        $response = $this->get(route('albums.create'));

        $response->assertOk()->assertViewIs('Admin.app.albums.create');
    }

    /**
     * @test
     */
    public function it_stores_the_album()
    {
        $data = Album::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('albums.store'), $data);

        $this->assertDatabaseHas('albums', $data);

        $album = Album::latest('id')->first();

        $response->assertRedirect(route('albums.edit', $album));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_album()
    {
        $album = Album::factory()->create();

        $response = $this->get(route('albums.show', $album));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.albums.show')
            ->assertViewHas('album');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_album()
    {
        $album = Album::factory()->create();

        $response = $this->get(route('albums.edit', $album));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.albums.edit')
            ->assertViewHas('album');
    }

    /**
     * @test
     */
    public function it_updates_the_album()
    {
        $album = Album::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'image' => $this->faker->text(255),
            'order_id' => $order->id,
        ];

        $response = $this->put(route('albums.update', $album), $data);

        $data['id'] = $album->id;

        $this->assertDatabaseHas('albums', $data);

        $response->assertRedirect(route('albums.edit', $album));
    }

    /**
     * @test
     */
    public function it_deletes_the_album()
    {
        $album = Album::factory()->create();

        $response = $this->delete(route('albums.destroy', $album));

        $response->assertRedirect(route('albums.index'));

        $this->assertModelMissing($album);
    }
}
