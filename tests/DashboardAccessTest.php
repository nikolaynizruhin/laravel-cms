<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardAccessTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test user can visit home page.
     *
     * @return void
     */
    public function test_user_can_visit_home_page()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/home')
            ->see($user->name)
            ->see('Posts');
    }
}
