<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class etablissements
 * @package App\Models
 * @version April 27, 2019, 8:25 pm UTC
 *
 * @property string name
 * @property string adresse
 * @property string email
 * @property string phone
 */
class etablissements extends Model
{

    public $table = 'etablissements';
    


    public $fillable = [
        'name',
        'adresse',
        'email',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'adresse' => 'string',
        'email' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone' => 'exit'
    ];

    
}
