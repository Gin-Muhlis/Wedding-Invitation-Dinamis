<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Fitur;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FiturControllerTest extends TestCase
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
    public function it_displays_index_view_with_fiturs()
    {
        $fiturs = Fitur::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('fiturs.index'));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fiturs.index')
            ->assertViewHas('fiturs');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_fitur()
    {
        $response = $this->get(route('fiturs.create'));

        $response->assertOk()->assertViewIs('Admin.app.fiturs.create');
    }

    /**
     * @test
     */
    public function it_stores_the_fitur()
    {
        $data = Fitur::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('fiturs.store'), $data);

        $this->assertDatabaseHas('fiturs', $data);

        $fitur = Fitur::latest('id')->first();

        $response->assertRedirect(route('fiturs.edit', $fitur));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_fitur()
    {
        $fitur = Fitur::factory()->create();

        $response = $this->get(route('fiturs.show', $fitur));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fiturs.show')
            ->assertViewHas('fitur');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_fitur()
    {
        $fitur = Fitur::factory()->create();

        $response = $this->get(route('fiturs.edit', $fitur));

        $response
            ->assertOk()
            ->assertViewIs('Admin.app.fiturs.edit')
            ->assertViewHas('fitur');
    }

    /**
     * @test
     */
    public function it_updates_the_fitur()
    {
        $fitur = Fitur::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'icon' => $this->faker->text(255),
        ];

        $response = $this->put(route('fiturs.update', $fitur), $data);

        $data['id'] = $fitur->id;

        $this->assertDatabaseHas('fiturs', $data);

        $response->assertRedirect(route('fiturs.edit', $fitur));
    }

    /**
     * @test
     */
    public function it_deletes_the_fitur()
    {
        $fitur = Fitur::factory()->create();

        $response = $this->delete(route('fiturs.destroy', $fitur));

        $response->assertRedirect(route('fiturs.index'));

        $this->assertModelMissing($fitur);
    }
}
