<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
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
     * Test user can visit home page.
     *
     * @return void
     */
    public function test_user_can_visit_home_page()
    {
        $this->actingAs($this->user)
            ->visit('/home')
            ->see($this->user->name)
            ->see('Posts')
            ->see('Tags')
            ->see('Categories');
    }
}
