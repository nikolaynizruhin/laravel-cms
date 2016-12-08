<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostsByCategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Show posts by category.
     *
     * @return void
     */
    public function test_show_posts_by_category()
    {
        $post = factory(App\Post::class)->create();

        $category = $post->category;

        $this->visit('/categories/' . $category->id)
             ->see($post->title);
    }
}
