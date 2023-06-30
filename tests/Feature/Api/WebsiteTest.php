<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Website;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebsiteTest extends TestCase
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
    public function it_gets_websites_list()
    {
        $websites = Website::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.websites.index'));

        $response->assertOk()->assertSee($websites[0]->website_name);
    }

    /**
     * @test
     */
    public function it_stores_the_website()
    {
        $data = Website::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.websites.store'), $data);

        $this->assertDatabaseHas('websites', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.websites.update', $website),
            $data
        );

        $data['id'] = $website->id;

        $this->assertDatabaseHas('websites', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_website()
    {
        $website = Website::factory()->create();

        $response = $this->deleteJson(route('api.websites.destroy', $website));

        $this->assertModelMissing($website);

        $response->assertNoContent();
    }
}
