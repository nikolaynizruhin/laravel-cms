<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostsByTagTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Show posts by tag.
     *
     * @return void
     */
    public function test_show_posts_by_tag()
    {
        $post = factory(App\Post::class)->create();

        $tag = factory(App\Tag::class)->create();

        $post->tags()->attach($tag->id);

        $this->visit('/tags/' . $tag->id)
            ->see($post->title);
    }
}
