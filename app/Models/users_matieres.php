<?php

namespace NdaartuAPI\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class users_matieres
 * @package NdaartuAPI\Models
 * @version April 27, 2019, 10:00 pm UTC
 *
 */
class users_matieres extends Model
{

    public $table = 'users_matieres';
    


    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
