<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AvatarUploadTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * An avatar can be uploaded.
     *
     * @return void
     */
    public function test_avatar_can_be_uploaded()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/profile')
             ->attach(public_path('/uploads/avatars/default.jpg'), 'avatar')
             ->press('Submit')
             ->see('Profile avatar updated!');
    }
}
