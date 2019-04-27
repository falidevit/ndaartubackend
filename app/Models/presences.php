<?php

namespace NdarrtuAPI\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class presences
 * @package NdarrtuAPI\Models
 * @version April 27, 2019, 9:43 pm UTC
 *
 * @property string date
 * @property TIME heure
 */
class presences extends Model
{

    public $table = 'presences';
    


    public $fillable = [
        'date',
        'heure'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'required',
        'heure' => 'users_id integer:unsigned:foreign,users,id text s'
    ];

    
}
