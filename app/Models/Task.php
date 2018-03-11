<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Task
 * @package App\Models
 * @version March 11, 2018, 7:03 pm UTC
 */
class Task extends Model
{
    use SoftDeletes;

    public $table = 'tasks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'note' => 'string',
        'status_id' => 'integer',
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
    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
