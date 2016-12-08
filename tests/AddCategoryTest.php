<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddCategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Add a category.
     *
     * @return void
     */
    public function test_user_can_add_a_category()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/home')
            ->click('Categories')
            ->type('test_category', 'name')
            ->press('Add')
            ->seePageIs('/home');
    }
}
