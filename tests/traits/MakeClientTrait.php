<?php

use Faker\Factory as Faker;
use App\Models\Client;
use App\Repositories\ClientRepository;

trait MakeClientTrait
{
    /**
     * Create fake instance of Client and save it in database
     *
     * @param array $clientFields
     * @return Client
     */
    public function makeClient($clientFields = [])
    {
        /** @var ClientRepository $clientRepo */
        $clientRepo = App::make(ClientRepository::class);
        $theme = $this->fakeClientData($clientFields);
        return $clientRepo->create($theme);
    }

    /**
     * Get fake instance of Client
     *
     * @param array $clientFields
     * @return Client
     */
    public function fakeClient($clientFields = [])
    {
        return new Client($this->fakeClientData($clientFields));
    }

    /**
     * Get fake data of Client
     *
     * @param array $postFields
     * @return array
     */
    public function fakeClientData($clientFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'logo' => $fake->word,
            'description' => $fake->text,
            'note' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_by' => $fake->randomDigitNotNull
        ], $clientFields);
    }
}
