<?php

namespace NdaartuAPI\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class absences
 * @package NdaartuAPI\Models
 * @version April 27, 2019, 9:13 pm UTC
 *
 * @property string date
 * @property TIME heure
 * @property integer eleve_id
 * @property integer classes_id
 * @property integer matieres_id
 * @property integer annees_id
 */
class absences extends Model
{

    public $table = 'absences';
    


    public $fillable = [
        'date',
        'heure',
        'eleve_id',
        'classes_id',
        'matieres_id',
        'annees_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'eleve_id' => 'integer',
        'classes_id' => 'integer',
        'matieres_id' => 'integer',
        'annees_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
