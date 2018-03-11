<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserProfile
 * @package App\Models
 * @version March 11, 2018, 7:05 pm UTC
 */
class UserProfile extends Model
{
    use SoftDeletes;

    public $table = 'user_profiles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'facebook',
        'twitter',
        'googleplus',
        'linkedin',
        'about',
        'website',
        'phone',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'facebook' => 'string',
        'twitter' => 'string',
        'googleplus' => 'string',
        'linkedin' => 'string',
        'about' => 'string',
        'website' => 'string',
        'phone' => 'string',
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
}
