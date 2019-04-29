<?php

namespace NdaartuAPI\Repositories;

use NdaartuAPI\Models\presences;
use NdaartuAPI\Repositories\BaseRepository;

/**
 * Class presencesRepository
 * @package NdaartuAPI\Repositories
 * @version April 27, 2019, 9:43 pm UTC
*/

class presencesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'heure'
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
        return presences::class;
    }
}
