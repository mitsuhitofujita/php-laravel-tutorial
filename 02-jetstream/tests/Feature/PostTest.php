<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_create_post_screen_can_be_rendered()
    {
        $response = $this->actingAs($this->user)->get('/posts/create');

        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_can_create_new_post()
    {
        $response = $this->actingAs($this->user)->put('/posts', ['payload' => 'new message']);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('posts', [
            'user_id' => $this->user->id,
            'payload' => 'new message',
        ]);
        $response->assertStatus(201);
    }

    public function test_update_post_screen_can_be_rendered()
    {
        $post = Post::factory()->create([
            'user_id' => $this->user->id,
        ]);
        $response = $this->actingAs($this->user)->get("/posts/{$post->id}/edit");

        $this->assertAuthenticated();
        $response->assertStatus(200);
    }

    public function test_can_update_existing_post()
    {
        $post = Post::factory()->create([
            'user_id' => $this->user->id,
            'payload' => 'existing message',
        ]);
        $response = $this->actingAs($this->user)->put("/posts/{$post->id}", ['payload' => 'updated message']);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'payload' => 'updated message',
        ]);
        $response->assertStatus(204);
    }
}
