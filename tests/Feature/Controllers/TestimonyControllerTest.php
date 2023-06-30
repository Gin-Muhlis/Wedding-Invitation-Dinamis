<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Testimony;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestimonyControllerTest extends TestCase
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
    public function it_displays_index_view_with_testimonies()
    {
        $testimonies = Testimony::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('testimonies.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.testimonies.index')
            ->assertViewHas('testimonies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_testimony()
    {
        $response = $this->get(route('testimonies.create'));

        $response->assertOk()->assertViewIs('Admin.app.testimonies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_testimony()
    {
        $data = Testimony::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('testimonies.store'), $data);

        $this->assertDatabaseHas('testimonies', $data);

        $testimony = Testimony::latest('id')->first();

        $response->assertRedirect(route('testimonies.edit', $testimony));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_testimony()
    {
        $testimony = Testimony::factory()->create();

        $response = $this->get(route('testimonies.show', $testimony));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.testimonies.show')
            ->assertViewHas('testimony');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_testimony()
    {
        $testimony = Testimony::factory()->create();

        $response = $this->get(route('testimonies.edit', $testimony));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.testimonies.edit')
            ->assertViewHas('testimony');
    }

    /**
     * @test
     */
    public function it_updates_the_testimony()
    {
        $testimony = Testimony::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'image' => $this->faker->text(255),
            'rating' => $this->faker->randomNumber(0),
            'review' => $this->faker->text,
        ];

        $response = $this->put(route('testimonies.update', $testimony), $data);

        $data['id'] = $testimony->id;

        $this->assertDatabaseHas('testimonies', $data);

        $response->assertRedirect(route('testimonies.edit', $testimony));
    }

    /**
     * @test
     */
    public function it_deletes_the_testimony()
    {
        $testimony = Testimony::factory()->create();

        $response = $this->delete(route('testimonies.destroy', $testimony));

        $response->assertRedirect(route('testimonies.index'));

        $this->assertModelMissing($testimony);
    }
}
