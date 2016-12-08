<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileAccessTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A User can access to profile page.
     *
     * @return void
     */
    public function test_user_can_access_to_profile_page()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/profile')
             ->see($user->name . '`s Profile');
    }
}
