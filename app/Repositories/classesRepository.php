<?php

namespace App\Repositories;

use App\Models\classes;
use App\Repositories\BaseRepository;

/**
 * Class classesRepository
 * @package App\Repositories
 * @version April 27, 2019, 8:54 pm UTC
*/

class classesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'level',
        'label'
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
        return classes::class;
    }
}
