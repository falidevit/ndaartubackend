<?php

namespace NdarrtuAPI\Repositories;

use NdarrtuAPI\Models\presences;
use NdarrtuAPI\Repositories\BaseRepository;

/**
 * Class presencesRepository
 * @package NdarrtuAPI\Repositories
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
