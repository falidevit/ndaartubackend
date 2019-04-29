<?php

namespace NdaartuAPI\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class classes
 * @package NdaartuAPI\Models
 * @version April 27, 2019, 8:54 pm UTC
 *
 * @property string level
 * @property string label
 * @property integer surveillant_id
 * @property integer etablissements_id
 */
class classes extends Model
{

    public $table = 'classes';
    


    public $fillable = [
        'level',
        'label',
        'surveillant_id',
        'etablissements_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'level' => 'string',
        'label' => 'string',
        'surveillant_id' => 'integer',
        'etablissements_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'level' => 'required',
        'label' => 'required'
    ];

    
}
