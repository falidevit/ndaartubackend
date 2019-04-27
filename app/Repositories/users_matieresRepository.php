<?php

namespace NdarrtuAPI\Repositories;

use NdarrtuAPI\Models\users_matieres;
use NdarrtuAPI\Repositories\BaseRepository;

/**
 * Class users_matieresRepository
 * @package NdarrtuAPI\Repositories
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
