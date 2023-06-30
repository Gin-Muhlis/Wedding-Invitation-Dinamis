<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Catgory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CatgoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_catgories()
    {
        $catgories = Catgory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('catgories.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.catgories.index')
            ->assertViewHas('catgories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_catgory()
    {
        $response = $this->get(route('catgories.create'));

        $response->assertOk()->assertViewIs('Admin.app.catgories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_catgory()
    {
        $data = Catgory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('catgories.store'), $data);

        $this->assertDatabaseHas('catgories', $data);

        $catgory = Catgory::latest('id')->first();

        $response->assertRedirect(route('catgories.edit', $catgory));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_catgory()
    {
        $catgory = Catgory::factory()->create();

        $response = $this->get(route('catgories.show', $catgory));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.catgories.show')
            ->assertViewHas('catgory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_catgory()
    {
        $catgory = Catgory::factory()->create();

        $response = $this->get(route('catgories.edit', $catgory));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.catgories.edit')
            ->assertViewHas('catgory');
    }

    /**
     * @test
     */
    public function it_updates_the_catgory()
    {
        $catgory = Catgory::factory()->create();

        $data = [
            'category' => $this->faker->text(255),
            'price' => $this->faker->randomNumber,
        ];

        $response = $this->put(route('catgories.update', $catgory), $data);

        $data['id'] = $catgory->id;

        $this->assertDatabaseHas('catgories', $data);

        $response->assertRedirect(route('catgories.edit', $catgory));
    }

    /**
     * @test
     */
    public function it_deletes_the_catgory()
    {
        $catgory = Catgory::factory()->create();

        $response = $this->delete(route('catgories.destroy', $catgory));

        $response->assertRedirect(route('catgories.index'));

        $this->assertModelMissing($catgory);
    }
}
