<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package App\Models
 * @version March 11, 2018, 7:02 pm UTC
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'projects';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'note' => 'string',
        'client_id' => 'integer',
        'status_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
        'created_by' => 'integer',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function user()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pomodoros()
    {
        return $this->hasMany(\App\Models\Pomodoro::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tasks()
    {
        return $this->hasMany(\App\Models\Task::class);
    }
}
