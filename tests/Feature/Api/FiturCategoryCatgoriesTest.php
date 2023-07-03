<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Catgory;
use App\Models\FiturCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FiturCategoryCatgoriesTest extends TestCase
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
    public function it_gets_fitur_category_catgories()
    {
        $fiturCategory = FiturCategory::factory()->create();
        $catgory = Catgory::factory()->create();

        $fiturCategory->catgories()->attach($catgory);

        $response = $this->getJson(
            route('api.fitur-categories.catgories.index', $fiturCategory)
        );

        $response->assertOk()->assertSee($catgory->category);
    }

    /**
     * @test
     */
    public function it_can_attach_catgories_to_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();
        $catgory = Catgory::factory()->create();

        $response = $this->postJson(
            route('api.fitur-categories.catgories.store', [
                $fiturCategory,
                $catgory,
            ])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $fiturCategory
                ->catgories()
                ->where('catgories.id', $catgory->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_catgories_from_fitur_category()
    {
        $fiturCategory = FiturCategory::factory()->create();
        $catgory = Catgory::factory()->create();

        $response = $this->deleteJson(
            route('api.fitur-categories.catgories.store', [
                $fiturCategory,
                $catgory,
            ])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $fiturCategory
                ->catgories()
                ->where('catgories.id', $catgory->id)
                ->exists()
        );
    }
}
