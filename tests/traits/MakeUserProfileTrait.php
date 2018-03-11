<?php

use Faker\Factory as Faker;
use App\Models\UserProfile;
use App\Repositories\UserProfileRepository;

trait MakeUserProfileTrait
{
    /**
     * Create fake instance of UserProfile and save it in database
     *
     * @param array $userProfileFields
     * @return UserProfile
     */
    public function makeUserProfile($userProfileFields = [])
    {
        /** @var UserProfileRepository $userProfileRepo */
        $userProfileRepo = App::make(UserProfileRepository::class);
        $theme = $this->fakeUserProfileData($userProfileFields);
        return $userProfileRepo->create($theme);
    }

    /**
     * Get fake instance of UserProfile
     *
     * @param array $userProfileFields
     * @return UserProfile
     */
    public function fakeUserProfile($userProfileFields = [])
    {
        return new UserProfile($this->fakeUserProfileData($userProfileFields));
    }

    /**
     * Get fake data of UserProfile
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserProfileData($userProfileFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'facebook' => $fake->word,
            'twitter' => $fake->word,
            'googleplus' => $fake->word,
            'linkedin' => $fake->word,
            'about' => $fake->text,
            'website' => $fake->word,
            'phone' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_by' => $fake->randomDigitNotNull
        ], $userProfileFields);
    }
}
