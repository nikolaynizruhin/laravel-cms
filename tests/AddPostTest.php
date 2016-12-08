<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddPostTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Instance of User class.
     *
     * @var
     */
    private $user;

    /**
     * Instance of Tag class.
     *
     * @var
     */
    private $tag;

    /**
     * Instance of Category class.
     *
     * @var
     */
    private $category;

    /**
     * Set a user, category and tag.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(App\User::class)->create();

        $this->category = factory(App\Category::class)->create();

        $this->tag = factory(App\Tag::class)->create();
    }

    /**
     * Add a post.
     *
     * @return void
     */
    public function test_user_can_add_a_post()
    {
        $this->actingAs($this->user)
            ->visit('/home')
            ->click('Add')
            ->type('Test title', 'title')
            ->select($this->category->id, 'category_id')
            ->type('Test excerpt', 'excerpt')
            ->type('Test body', 'body')
            ->select($this->tag->id, 'tags[]')
            ->press('Create')
            ->seePageIs('/home');
    }
}
