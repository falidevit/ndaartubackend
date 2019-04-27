<?php

namespace App\Repositories;

use App\Models\etablissements;
use App\Repositories\BaseRepository;

/**
 * Class etablissementsRepository
 * @package App\Repositories
 * @version April 27, 2019, 8:25 pm UTC
*/

class etablissementsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'adresse',
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
        return etablissements::class;
    }
}
