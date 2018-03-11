<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version March 11, 2018, 7:02 pm UTC
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'logo',
        'description',
        'note',
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
        'logo' => 'string',
        'description' => 'string',
        'note' => 'string',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
