<?php

namespace NdaartuAPI\Repositories;

use NdaartuAPI\Models\matieres;
use NdaartuAPI\Repositories\BaseRepository;

/**
 * Class matieresRepository
 * @package NdaartuAPI\Repositories
 * @version April 27, 2019, 7:26 pm UTC
*/

class matieresRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle',
        'description'
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
        return matieres::class;
    }
}
