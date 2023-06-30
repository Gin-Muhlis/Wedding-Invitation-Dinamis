<?php

namespace Tests\Feature\Controllers;

use App\Models\Faq;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FaqControllerTest extends TestCase
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
    public function it_displays_index_view_with_faqs()
    {
        $faqs = Faq::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('faqs.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.faqs.index')
            ->assertViewHas('faqs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_faq()
    {
        $response = $this->get(route('faqs.create'));

        $response->assertOk()->assertViewIs('Admin.app.faqs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_faq()
    {
        $data = Faq::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('faqs.store'), $data);

        $this->assertDatabaseHas('faqs', $data);

        $faq = Faq::latest('id')->first();

        $response->assertRedirect(route('faqs.edit', $faq));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_faq()
    {
        $faq = Faq::factory()->create();

        $response = $this->get(route('faqs.show', $faq));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.faqs.show')
            ->assertViewHas('faq');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_faq()
    {
        $faq = Faq::factory()->create();

        $response = $this->get(route('faqs.edit', $faq));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.faqs.edit')
            ->assertViewHas('faq');
    }

    /**
     * @test
     */
    public function it_updates_the_faq()
    {
        $faq = Faq::factory()->create();

        $data = [
            'question' => $this->faker->text(255),
            'answer' => $this->faker->text,
        ];

        $response = $this->put(route('faqs.update', $faq), $data);

        $data['id'] = $faq->id;

        $this->assertDatabaseHas('faqs', $data);

        $response->assertRedirect(route('faqs.edit', $faq));
    }

    /**
     * @test
     */
    public function it_deletes_the_faq()
    {
        $faq = Faq::factory()->create();

        $response = $this->delete(route('faqs.destroy', $faq));

        $response->assertRedirect(route('faqs.index'));

        $this->assertModelMissing($faq);
    }
}
