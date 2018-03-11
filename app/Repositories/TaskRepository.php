<?php

namespace App\Repositories;

use App\Models\Task;
use InfyOm\Generator\Common\BaseRepository;

class TaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'note',
        'status_id',
        'user_id',
        'project_id',
        'start_date',
        'end_date',
        'completed_on',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Task::class;
    }
}
