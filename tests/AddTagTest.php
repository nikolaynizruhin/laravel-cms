<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddTagTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Instance of User class.
     *
     * @var
     */
    private $user;

    /**
     * Set a user.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(App\User::class)->create();
    }

    /**
     * Add a tag.
     *
     * @return void
     */
    public function test_user_can_add_a_tag()
    {
        $this->actingAs($this->user)
             ->visit('/home')
             ->click('Tags')
             ->type('test_tag', 'name')
             ->press('Add')
             ->seePageIs('/home');
    }
}
