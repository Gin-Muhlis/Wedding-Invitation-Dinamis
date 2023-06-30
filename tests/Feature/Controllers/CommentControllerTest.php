<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Comment;

use App\Models\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentControllerTest extends TestCase
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
    public function it_displays_index_view_with_comments()
    {
        $comments = Comment::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('comments.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.comments.index')
            ->assertViewHas('comments');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_comment()
    {
        $response = $this->get(route('comments.create'));

        $response->assertOk()->assertViewIs('Admin.app.comments.create');
    }

    /**
     * @test
     */
    public function it_stores_the_comment()
    {
        $data = Comment::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('comments.store'), $data);

        $this->assertDatabaseHas('comments', $data);

        $comment = Comment::latest('id')->first();

        $response->assertRedirect(route('comments.edit', $comment));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->get(route('comments.show', $comment));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.comments.show')
            ->assertViewHas('comment');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->get(route('comments.edit', $comment));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.comments.edit')
            ->assertViewHas('comment');
    }

    /**
     * @test
     */
    public function it_updates_the_comment()
    {
        $comment = Comment::factory()->create();

        $order = Order::factory()->create();

        $data = [
            'name' => $this->faker->text(255),
            'comment' => $this->faker->text,
            'order_id' => $order->id,
        ];

        $response = $this->put(route('comments.update', $comment), $data);

        $data['id'] = $comment->id;

        $this->assertDatabaseHas('comments', $data);

        $response->assertRedirect(route('comments.edit', $comment));
    }

    /**
     * @test
     */
    public function it_deletes_the_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->delete(route('comments.destroy', $comment));

        $response->assertRedirect(route('comments.index'));

        $this->assertModelMissing($comment);
    }
}
