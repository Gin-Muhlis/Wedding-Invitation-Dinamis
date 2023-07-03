<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FiturCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FiturCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_fitur_categories()
    {
        $fiturCategories = FiturCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('fitur-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fitur_categories.index')
            ->assertViewHas('fiturCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_fitur_category()
    {
        $response = $this->get(route('fitur-categories.create'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fitur_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_fitur_category()
    {
        $data = FiturCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('fitur-categories.store'), $data);

        $this->assertDatabaseHas('fitur_categories', $data);

        $fiturCategory = FiturCategory::latest('id')->first();

        $response->assertRedirect(
            route('fitur-categories.edit', $fiturCategory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();

        $response = $this->get(route('fitur-categories.show', $fiturCategory));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fitur_categories.show')
            ->assertViewHas('fiturCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();

        $response = $this->get(route('fitur-categories.edit', $fiturCategory));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fitur_categories.edit')
            ->assertViewHas('fiturCategory');
    }

    /**
     * @test
     */
    public function it_updates_the_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();

        $data = [
            'name' => $this->faker->name(),
        ];

        $response = $this->put(
            route('fitur-categories.update', $fiturCategory),
            $data
        );

        $data['id'] = $fiturCategory->id;

        $this->assertDatabaseHas('fitur_categories', $data);

        $response->assertRedirect(
            route('fitur-categories.edit', $fiturCategory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();

        $response = $this->delete(
            route('fitur-categories.destroy', $fiturCategory)
        );

        $response->assertRedirect(route('fitur-categories.index'));

        $this->assertModelMissing($fiturCategory);
    }
}
