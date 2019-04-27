<?php

namespace NdarrtuAPI\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class annees
 * @package NdarrtuAPI\Models
 * @version April 27, 2019, 8:58 pm UTC
 *
 * @property string annee_academique
 */
class annees extends Model
{

    public $table = 'annees';
    


    public $fillable = [
        'annee_academique'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'annee_academique' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'annee_academique' => 'required'
    ];

    
}
