<?php

namespace App\Repositories;

use App\Models\Project;
use InfyOm\Generator\Common\BaseRepository;

class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'note',
        'client_id',
        'status_id',
        'start_date',
        'end_date',
        'created_by',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }
}
