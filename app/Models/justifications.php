<?php

namespace NdaartuAPI\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class justifications
 * @package NdaartuAPI\Models
 * @version April 27, 2019, 9:20 pm UTC
 *
 * @property string motif
 * @property string preuve_path
 * @property integer absences_id
 */
class justifications extends Model
{

    public $table = 'justifications';
    


    public $fillable = [
        'motif',
        'preuve_path',
        'absences_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'motif' => 'string',
        'preuve_path' => 'string',
        'absences_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
