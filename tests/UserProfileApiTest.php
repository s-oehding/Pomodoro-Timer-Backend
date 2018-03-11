<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserProfileApiTest extends TestCase
{
    use MakeUserProfileTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUserProfile()
    {
        $userProfile = $this->fakeUserProfileData();
        $this->json('POST', '/api/v1/userProfiles', $userProfile);

        $this->assertApiResponse($userProfile);
    }

    /**
     * @test
     */
    public function testReadUserProfile()
    {
        $userProfile = $this->makeUserProfile();
        $this->json('GET', '/api/v1/userProfiles/'.$userProfile->id);

        $this->assertApiResponse($userProfile->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUserProfile()
    {
        $userProfile = $this->makeUserProfile();
        $editedUserProfile = $this->fakeUserProfileData();

        $this->json('PUT', '/api/v1/userProfiles/'.$userProfile->id, $editedUserProfile);

        $this->assertApiResponse($editedUserProfile);
    }

    /**
     * @test
     */
    public function testDeleteUserProfile()
    {
        $userProfile = $this->makeUserProfile();
        $this->json('DELETE', '/api/v1/userProfiles/'.$userProfile->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userProfiles/'.$userProfile->id);

        $this->assertResponseStatus(404);
    }
}
