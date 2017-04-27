<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForum extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->be($user = factory(User::class)->create());
        $thread = factory(Thread::class)->create();

        $reply = factory(Reply::class)->make();
        $this->post("/threads/{$thread->id}/replies", $reply->toArray());

        $this->get("/threads/{$thread->id}")
            ->assertSee($reply->body);
    }

    /** @test */
    function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException(\Illuminate\Auth\AuthenticationException::class);

        $this->post('/threads/1/replies', []);
    }
}
