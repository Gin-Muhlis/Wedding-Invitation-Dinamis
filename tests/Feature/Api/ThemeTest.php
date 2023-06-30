<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Theme;

use App\Models\Catgory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThemeTest extends TestCase
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
    public function it_gets_themes_list()
    {
        $themes = Theme::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.themes.index'));

        $response->assertOk()->assertSee($themes[0]->theme_name);
    }

    /**
     * @test
     */
    public function it_stores_the_theme()
    {
        $data = Theme::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.themes.store'), $data);

        $this->assertDatabaseHas('themes', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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
            'type' => 'pakai foto',
            'catgory_id' => $catgory->id,
        ];

        $response = $this->putJson(route('api.themes.update', $theme), $data);

        $data['id'] = $theme->id;

        $this->assertDatabaseHas('themes', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_theme()
    {
        $theme = Theme::factory()->create();

        $response = $this->deleteJson(route('api.themes.destroy', $theme));

        $this->assertModelMissing($theme);

        $response->assertNoContent();
    }
}
