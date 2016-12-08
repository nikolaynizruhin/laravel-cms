<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddTagTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Add a tag.
     *
     * @return void
     */
    public function test_user_can_add_a_tag()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/home')
             ->click('Tags')
             ->type('test_tag', 'name')
             ->press('Add')
             ->seePageIs('/home');
    }
}
