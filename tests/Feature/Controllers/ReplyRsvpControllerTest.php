<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ReplyRsvp;

use App\Models\Rsvp;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyRsvpControllerTest extends TestCase
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
    public function it_displays_index_view_with_reply_rsvps()
    {
        $replyRsvps = ReplyRsvp::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('reply-rsvps.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.reply_rsvps.index')
            ->assertViewHas('replyRsvps');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_reply_rsvp()
    {
        $response = $this->get(route('reply-rsvps.create'));

        $response->assertOk()->assertViewIs('Admin.app.reply_rsvps.create');
    }

    /**
     * @test
     */
    public function it_stores_the_reply_rsvp()
    {
        $data = ReplyRsvp::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('reply-rsvps.store'), $data);

        $this->assertDatabaseHas('reply_rsvps', $data);

        $replyRsvp = ReplyRsvp::latest('id')->first();

        $response->assertRedirect(route('reply-rsvps.edit', $replyRsvp));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_reply_rsvp()
    {
        $replyRsvp = ReplyRsvp::factory()->create();

        $response = $this->get(route('reply-rsvps.show', $replyRsvp));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.reply_rsvps.show')
            ->assertViewHas('replyRsvp');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_reply_rsvp()
    {
        $replyRsvp = ReplyRsvp::factory()->create();

        $response = $this->get(route('reply-rsvps.edit', $replyRsvp));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.reply_rsvps.edit')
            ->assertViewHas('replyRsvp');
    }

    /**
     * @test
     */
    public function it_updates_the_reply_rsvp()
    {
        $replyRsvp = ReplyRsvp::factory()->create();

        $rsvp = Rsvp::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'reply' => $this->faker->text,
            'kehadiran' => 'hadir',
            'bg_profile' => $this->faker->text(255),
            'rsvp_id' => $rsvp->id,
        ];

        $response = $this->put(route('reply-rsvps.update', $replyRsvp), $data);

        $data['id'] = $replyRsvp->id;

        $this->assertDatabaseHas('reply_rsvps', $data);

        $response->assertRedirect(route('reply-rsvps.edit', $replyRsvp));
    }

    /**
     * @test
     */
    public function it_deletes_the_reply_rsvp()
    {
        $replyRsvp = ReplyRsvp::factory()->create();

        $response = $this->delete(route('reply-rsvps.destroy', $replyRsvp));

        $response->assertRedirect(route('reply-rsvps.index'));

        $this->assertModelMissing($replyRsvp);
    }
}
