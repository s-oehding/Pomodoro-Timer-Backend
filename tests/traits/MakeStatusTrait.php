<?php

use Faker\Factory as Faker;
use App\Models\Status;
use App\Repositories\StatusRepository;

trait MakeStatusTrait
{
    /**
     * Create fake instance of Status and save it in database
     *
     * @param array $statusFields
     * @return Status
     */
    public function makeStatus($statusFields = [])
    {
        /** @var StatusRepository $statusRepo */
        $statusRepo = App::make(StatusRepository::class);
        $theme = $this->fakeStatusData($statusFields);
        return $statusRepo->create($theme);
    }

    /**
     * Get fake instance of Status
     *
     * @param array $statusFields
     * @return Status
     */
    public function fakeStatus($statusFields = [])
    {
        return new Status($this->fakeStatusData($statusFields));
    }

    /**
     * Get fake data of Status
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusData($statusFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $statusFields);
    }
}
