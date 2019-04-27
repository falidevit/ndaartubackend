<?php

namespace NdarrtuAPI\Repositories;

use NdarrtuAPI\Models\absences;
use NdarrtuAPI\Repositories\BaseRepository;

/**
 * Class absencesRepository
 * @package NdarrtuAPI\Repositories
 * @version April 27, 2019, 9:13 pm UTC
*/

class absencesRepository extends BaseRepository
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
        return absences::class;
    }
}
