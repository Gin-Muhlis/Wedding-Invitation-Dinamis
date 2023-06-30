<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Theme;

use App\Models\Catgory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThemeControllerTest extends TestCase
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
    public function it_displays_index_view_with_themes()
    {
        $themes = Theme::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('themes.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.themes.index')
            ->assertViewHas('themes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_theme()
    {
        $response = $this->get(route('themes.create'));

        $response->assertOk()->assertViewIs('Admin.app.themes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_theme()
    {
        $data = Theme::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('themes.store'), $data);

        $this->assertDatabaseHas('themes', $data);

        $theme = Theme::latest('id')->first();

        $response->assertRedirect(route('themes.edit', $theme));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_theme()
    {
        $theme = Theme::factory()->create();

        $response = $this->get(route('themes.show', $theme));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.themes.show')
            ->assertViewHas('theme');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_theme()
    {
        $theme = Theme::factory()->create();

        $response = $this->get(route('themes.edit', $theme));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.themes.edit')
            ->assertViewHas('theme');
    }

    /**
     * @test
     */
    public function it_updates_the_theme()
    {
        $theme = Theme::factory()->create();

        $catgory = Catgory::factory()->create();

        $data = [
            'theme_name' => $this->faker->name(),
            'theme_code' => $this->faker->text(255),
            'catgory_id' => $catgory->id,
        ];

        $response = $this->put(route('themes.update', $theme), $data);

        $data['id'] = $theme->id;

        $this->assertDatabaseHas('themes', $data);

        $response->assertRedirect(route('themes.edit', $theme));
    }

    /**
     * @test
     */
    public function it_deletes_the_theme()
    {
        $theme = Theme::factory()->create();

        $response = $this->delete(route('themes.destroy', $theme));

        $response->assertRedirect(route('themes.index'));

        $this->assertModelMissing($theme);
    }
}
