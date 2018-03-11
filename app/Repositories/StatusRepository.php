<?php

namespace App\Repositories;

use App\Models\Status;
use InfyOm\Generator\Common\BaseRepository;

class StatusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Status::class;
    }
}
