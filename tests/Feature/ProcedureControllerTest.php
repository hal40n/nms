<?php

namespace Tests\Feature;

use App\Models\Procedure;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcedureControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_index_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $procedures = Procedure::factory(3)->create();

        $response = $this->get(route('procedures.index'));

        $response->assertStatus(200);
        $response->assertViewIs('procedures.index');
        $response->assertViewHas('procedures');
    }

    public function test_show_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $procedure = Procedure::factory()->create();

        $response = $this->get(route('procedures.show', $procedure->id));

        $response->assertStatus(200);
        $response->assertViewIs('procedures.show');
        $response->assertViewHas('procedure');
        $response->assertViewHas('pages');
    }

    public function test_create_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('procedures.create'));

        $response->assertStatus(200);
        $response->assertViewIs('procedures.create');
    }

    public function test_store_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $formData = [
            'title' => 'Test Procedure',
            'description' => 'This is a test procedure description.',
        ];

        $response = $this->post(route('procedures.store'), $formData);

        $this->assertDatabaseHas('procedures', [
            'title' => 'Test Procedure',
            'description' => 'This is a test procedure description.',
        ]);

        $response->assertRedirect(route('procedures.index'));
    }

    public function test_edit_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $procedure = Procedure::factory()->create();

        $response = $this->get(route('procedures.edit', $procedure->id));

        $response->assertStatus(200);
        $response->assertViewIs('procedures.edit');
        $response->assertViewHas('procedure');
    }

    public function test_update_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $procedure = Procedure::factory()->create();

        $formData = [
            'title' => 'Updated Procedure',
            'description' => 'This is an updated test procedure description.',
        ];

        $response = $this->put(route('procedures.update', $procedure->id), $formData);

        $this->assertDatabaseHas('procedures', [
            'id' => $procedure->id,
            'title' => 'Updated Procedure',
            'description' => 'This is an updated test procedure description.',
        ]);

        $response->assertRedirect(route('procedures.index'));
    }

    public function test_destroy_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $procedure = Procedure::factory()->create();

        $response = $this->delete(route('procedures.destroy', $procedure->id));

        $this->assertDatabaseMissing('procedures', [
            'id' => $procedure->id,
        ]);

        $response->assertRedirect(route('procedures.index'));
    }
}
