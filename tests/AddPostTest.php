<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddPostTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Add a post.
     *
     * @return void
     */
    public function test_user_can_add_a_post()
    {
        $user = factory(App\User::class)->create();
        $category = factory(App\Category::class)->create();
        $tag = factory(App\Tag::class)->create();

        $this->actingAs($user)
            ->visit('/home')
            ->click('Add')
            ->type('Test title', 'title')
            ->select($category->id, 'category_id')
            ->type('Test excerpt', 'excerpt')
            ->type('Test body', 'body')
            ->select($tag->id, 'tags[]')
            ->press('Create')
            ->seePageIs('/home');
    }
}
