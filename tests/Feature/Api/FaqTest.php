<?php

namespace Tests\Feature\Api;

use App\Models\Faq;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FaqTest extends TestCase
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
    public function it_gets_faqs_list()
    {
        $faqs = Faq::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.faqs.index'));

        $response->assertOk()->assertSee($faqs[0]->question);
    }

    /**
     * @test
     */
    public function it_stores_the_faq()
    {
        $data = Faq::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.faqs.store'), $data);

        $this->assertDatabaseHas('faqs', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.faqs.update', $faq), $data);

        $data['id'] = $faq->id;

        $this->assertDatabaseHas('faqs', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_faq()
    {
        $faq = Faq::factory()->create();

        $response = $this->deleteJson(route('api.faqs.destroy', $faq));

        $this->assertModelMissing($faq);

        $response->assertNoContent();
    }
}
