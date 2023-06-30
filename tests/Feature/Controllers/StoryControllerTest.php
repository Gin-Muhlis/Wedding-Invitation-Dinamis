<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Story;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_stories()
    {
        $stories = Story::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('stories.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.stories.index')
            ->assertViewHas('stories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_story()
    {
        $response = $this->get(route('stories.create'));

        $response->assertOk()->assertViewIs('Admin.app.stories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_story()
    {
        $data = Story::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('stories.store'), $data);

        $this->assertDatabaseHas('stories', $data);

        $story = Story::latest('id')->first();

        $response->assertRedirect(route('stories.edit', $story));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_story()
    {
        $story = Story::factory()->create();

        $response = $this->get(route('stories.show', $story));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.stories.show')
            ->assertViewHas('story');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_story()
    {
        $story = Story::factory()->create();

        $response = $this->get(route('stories.edit', $story));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.stories.edit')
            ->assertViewHas('story');
    }

    /**
     * @test
     */
    public function it_updates_the_story()
    {
        $story = Story::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'story_date' => $this->faker->date,
            'story_image' => $this->faker->text(255),
            'story_title' => $this->faker->text(255),
            'content' => $this->faker->text,
            'order_id' => $order->id,
        ];

        $response = $this->put(route('stories.update', $story), $data);

        $data['id'] = $story->id;

        $this->assertDatabaseHas('stories', $data);

        $response->assertRedirect(route('stories.edit', $story));
    }

    /**
     * @test
     */
    public function it_deletes_the_story()
    {
        $story = Story::factory()->create();

        $response = $this->delete(route('stories.destroy', $story));

        $response->assertRedirect(route('stories.index'));

        $this->assertModelMissing($story);
    }
}
