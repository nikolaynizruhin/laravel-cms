<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddCommentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Instance of Post class.
     *
     * @var
     */
    private $post;

    /**
     * Set a post.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->post = factory(App\Post::class)->create();
    }

    /**
     * A user can add comment to the post.
     *
     * @return void
     */
    public function test_user_can_add_a_comment()
    {
        $user = $this->post->user;

        $this->actingAs($user)
             ->visit('/posts/' . $this->post->id)
             ->see($this->post->title)
             ->type('Test comment', 'body')
             ->press('Reply')
             ->seeInDatabase('comments', ['body' => 'Test comment'])
             ->see('Test comment');
    }
}
