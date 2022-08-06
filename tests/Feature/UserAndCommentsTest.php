<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserAndCommentsTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_comment_with_user_id()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $comment = $this->faker->text(60);

        $this->actingAs($user)->json('POST', url('/api/user/'.$user->id.'/comment'), [
            'user_id' => $user->id,
            'password' => '00000000',
            'comment' => $comment,
        ]);

        $this->assertDatabaseHas('comments', [
            'user_id' => $user->id,
            'comment' => $comment,
        ]);
    }
}
