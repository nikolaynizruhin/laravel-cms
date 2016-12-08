<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddCategoryTest extends TestCase
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
     * Add a category.
     *
     * @return void
     */
    public function test_user_can_add_a_category()
    {
        $this->actingAs($this->user)
            ->visit('/home')
            ->click('Categories')
            ->type('test_category', 'name')
            ->press('Add')
            ->seePageIs('/home');
    }
}
