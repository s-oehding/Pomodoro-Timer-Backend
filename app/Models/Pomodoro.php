<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pomodoro
 * @package App\Models
 * @version March 11, 2018, 7:04 pm UTC
 */
class Pomodoro extends Model
{
    use SoftDeletes;

    public $table = 'pomodoros';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'status_id',
        'task_id',
        'user_id',
        'project_id',
        'start',
        'end',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_id' => 'integer',
        'task_id' => 'integer',
        'user_id' => 'integer',
        'project_id' => 'integer',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->hasOne(\App\Models\Status::class);
    }

}
