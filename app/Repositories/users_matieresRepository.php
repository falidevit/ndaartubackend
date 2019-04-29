<?php

namespace NdaartuAPI\Repositories;

use NdaartuAPI\Models\users_matieres;
use NdaartuAPI\Repositories\BaseRepository;

/**
 * Class users_matieresRepository
 * @package NdaartuAPI\Repositories
 * @version April 27, 2019, 10:00 pm UTC
*/

class users_matieresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return users_matieres::class;
    }
}
