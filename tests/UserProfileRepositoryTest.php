<?php

use App\Models\UserProfile;
use App\Repositories\UserProfileRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserProfileRepositoryTest extends TestCase
{
    use MakeUserProfileTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserProfileRepository
     */
    protected $userProfileRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userProfileRepo = App::make(UserProfileRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUserProfile()
    {
        $userProfile = $this->fakeUserProfileData();
        $createdUserProfile = $this->userProfileRepo->create($userProfile);
        $createdUserProfile = $createdUserProfile->toArray();
        $this->assertArrayHasKey('id', $createdUserProfile);
        $this->assertNotNull($createdUserProfile['id'], 'Created UserProfile must have id specified');
        $this->assertNotNull(UserProfile::find($createdUserProfile['id']), 'UserProfile with given id must be in DB');
        $this->assertModelData($userProfile, $createdUserProfile);
    }

    /**
     * @test read
     */
    public function testReadUserProfile()
    {
        $userProfile = $this->makeUserProfile();
        $dbUserProfile = $this->userProfileRepo->find($userProfile->id);
        $dbUserProfile = $dbUserProfile->toArray();
        $this->assertModelData($userProfile->toArray(), $dbUserProfile);
    }

    /**
     * @test update
     */
    public function testUpdateUserProfile()
    {
        $userProfile = $this->makeUserProfile();
        $fakeUserProfile = $this->fakeUserProfileData();
        $updatedUserProfile = $this->userProfileRepo->update($fakeUserProfile, $userProfile->id);
        $this->assertModelData($fakeUserProfile, $updatedUserProfile->toArray());
        $dbUserProfile = $this->userProfileRepo->find($userProfile->id);
        $this->assertModelData($fakeUserProfile, $dbUserProfile->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUserProfile()
    {
        $userProfile = $this->makeUserProfile();
        $resp = $this->userProfileRepo->delete($userProfile->id);
        $this->assertTrue($resp);
        $this->assertNull(UserProfile::find($userProfile->id), 'UserProfile should not exist in DB');
    }
}
