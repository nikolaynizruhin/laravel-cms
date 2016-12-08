<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddCommentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A user can add comment to the post.
     *
     * @return void
     */
    public function test_user_can_add_a_comment()
    {
        $post = factory(App\Post::class)->create();

        $user = $post->user;

        $this->actingAs($user)
             ->visit('/posts/' . $post->id)
             ->see($post->title)
             ->type('Test comment', 'body')
             ->press('Reply')
             ->seeInDatabase('comments', ['body' => 'Test comment'])
             ->see('Test comment');
    }
}
