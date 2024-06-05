<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Procedure;
use App\Models\Tag;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProcedureControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_store_method()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $tags = Tag::factory(3)->create();

        $formData = [
            'title' => 'Test Procedure',
            'content' => 'This is a test procedure content.',
            'category_id' => $category->id,
            'tags' => $tags->pluck('id')->toArray(),
        ];

        $response = $this->post(route('procedures.store'), $formData);

        $this->assertDatabaseHas('procedures', [
            'title' => 'Test Procedure',
            'content' => 'This is a test procedure content.',
            'category_id' => $category->id,
            'user_id' => $user->id,
        ]);

        $procedure = Procedure::where('title', 'Test Procedure')->first();
        $this->assertCount(3, $procedure->tags);

        $response->assertRedirect(route('procedures.index'));
        $response->assertSessionHas('success', 'Procedure created successfully.');
    }
}
