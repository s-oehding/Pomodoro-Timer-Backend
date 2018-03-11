<?php

namespace App\Repositories;

use App\Models\Pomodoro;
use InfyOm\Generator\Common\BaseRepository;

class PomodoroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status_id',
        'task_id',
        'user_id',
        'project_id',
        'start',
        'end',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pomodoro::class;
    }
}
