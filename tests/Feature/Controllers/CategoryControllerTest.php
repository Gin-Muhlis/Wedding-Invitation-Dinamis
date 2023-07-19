<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_categories()
    {
        $categories = Category::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.categories.index')
            ->assertViewHas('categories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_category()
    {
        $response = $this->get(route('categories.create'));

        $response->assertOk()->assertViewIs('Admin.app.categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_category()
    {
        $data = Category::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('categories.store'), $data);

        $this->assertDatabaseHas('categories', $data);

        $category = Category::latest('id')->first();

        $response->assertRedirect(route('categories.edit', $category));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_category()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.show', $category));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.categories.show')
            ->assertViewHas('category');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_category()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.edit', $category));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.categories.edit')
            ->assertViewHas('category');
    }

    /**
     * @test
     */
    public function it_updates_the_category()
    {
        $category = Category::factory()->create();

        $data = [
            'category' => $this->faker->text(255),
            'price' => $this->faker->randomNumber,
        ];

        $response = $this->put(route('categories.update', $category), $data);

        $data['id'] = $category->id;

        $this->assertDatabaseHas('categories', $data);

        $response->assertRedirect(route('categories.edit', $category));
    }

    /**
     * @test
     */
    public function it_deletes_the_category()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category));

        $response->assertRedirect(route('categories.index'));

        $this->assertModelMissing($category);
    }
}
