<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Website;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebsiteControllerTest extends TestCase
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
    public function it_displays_index_view_with_websites()
    {
        $websites = Website::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('websites.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.websites.index')
            ->assertViewHas('websites');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_website()
    {
        $response = $this->get(route('websites.create'));

        $response->assertOk()->assertViewIs('Admin.app.websites.create');
    }

    /**
     * @test
     */
    public function it_stores_the_website()
    {
        $data = Website::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('websites.store'), $data);

        $this->assertDatabaseHas('websites', $data);

        $website = Website::latest('id')->first();

        $response->assertRedirect(route('websites.edit', $website));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_website()
    {
        $website = Website::factory()->create();

        $response = $this->get(route('websites.show', $website));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.websites.show')
            ->assertViewHas('website');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_website()
    {
        $website = Website::factory()->create();

        $response = $this->get(route('websites.edit', $website));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.websites.edit')
            ->assertViewHas('website');
    }

    /**
     * @test
     */
    public function it_updates_the_website()
    {
        $website = Website::factory()->create();

        $data = [
            'website_name' => $this->faker->text(255),
            'website_logo' => $this->faker->text(255),
            'email' => $this->faker->email,
            'whatsapp_number' => $this->faker->text(255),
            'link_instagram' => $this->faker->text(255),
            'link_fb' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(route('websites.update', $website), $data);

        $data['id'] = $website->id;

        $this->assertDatabaseHas('websites', $data);

        $response->assertRedirect(route('websites.edit', $website));
    }

    /**
     * @test
     */
    public function it_deletes_the_website()
    {
        $website = Website::factory()->create();

        $response = $this->delete(route('websites.destroy', $website));

        $response->assertRedirect(route('websites.index'));

        $this->assertModelMissing($website);
    }
}
