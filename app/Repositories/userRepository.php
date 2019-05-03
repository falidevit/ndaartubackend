<?php

namespace App\Repositories;

use App\Models\user;
use NdaartuAPI\Repositories\BaseRepository;

/**
 * Class userRepository
 * @package App\Repositories
 * @version May 2, 2019, 1:52 pm UTC
*/

class userRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'address',
        'email',
        'phone'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return user::class;
    }
}
