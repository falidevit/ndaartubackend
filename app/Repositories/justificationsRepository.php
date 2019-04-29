<?php

namespace NdaartuAPI\Repositories;

use NdaartuAPI\Models\justifications;
use NdaartuAPI\Repositories\BaseRepository;

/**
 * Class justificationsRepository
 * @package NdaartuAPI\Repositories
 * @version April 27, 2019, 9:20 pm UTC
*/

class justificationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'motif',
        'preuve_path'
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
        return justifications::class;
    }
}
