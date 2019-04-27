<?php

namespace App\Repositories;

use App\Models\presences;
use App\Repositories\BaseRepository;

/**
 * Class presencesRepository
 * @package App\Repositories
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
