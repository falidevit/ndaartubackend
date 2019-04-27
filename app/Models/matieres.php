<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class matieres
 * @package App\Models
 * @version April 27, 2019, 7:26 pm UTC
 *
 * @property string libelle
 * @property string description
 */
class matieres extends Model
{

    public $table = 'matieres';
    


    public $fillable = [
        'libelle',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required'
    ];

    
}
