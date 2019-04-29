<?php

namespace NdaartuAPI\Repositories;

use NdaartuAPI\Models\annees;
use NdaartuAPI\Repositories\BaseRepository;

/**
 * Class anneesRepository
 * @package NdaartuAPI\Repositories
 * @version April 27, 2019, 8:58 pm UTC
*/

class anneesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'annee_academique'
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
        return annees::class;
    }
}
