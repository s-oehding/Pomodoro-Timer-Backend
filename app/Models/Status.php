<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 * @package App\Models
 * @version March 11, 2018, 7:03 pm UTC
 */
class Status extends Model
{
    use SoftDeletes;

    public $table = 'statuses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pomodoros()
    {
        return $this->belongsTo(\App\Models\Pomodoro::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function projects()
    {
        return $this->belongsTo(\App\Models\Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tasks()
    {
        return $this->belongsTo(\App\Models\Task::class);
    }
}
