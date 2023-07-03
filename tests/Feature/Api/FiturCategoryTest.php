<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\FiturCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FiturCategoryTest extends TestCase
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
    public function it_gets_fitur_categories_list()
    {
        $fiturCategories = FiturCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.fitur-categories.index'));

        $response->assertOk()->assertSee($fiturCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_fitur_category()
    {
        $data = FiturCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.fitur-categories.store'), $data);

        $this->assertDatabaseHas('fitur_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.fitur-categories.update', $fiturCategory),
            $data
        );

        $data['id'] = $fiturCategory->id;

        $this->assertDatabaseHas('fitur_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.fitur-categories.destroy', $fiturCategory)
        );

        $this->assertModelMissing($fiturCategory);

        $response->assertNoContent();
    }
}
