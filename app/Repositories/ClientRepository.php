<?php

namespace App\Repositories;

use App\Models\Client;
use InfyOm\Generator\Common\BaseRepository;

class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'logo',
        'description',
        'note',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Client::class;
    }
}
