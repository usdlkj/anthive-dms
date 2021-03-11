<?php

namespace App\Repositories;

use App\Models\ProjectField;
use App\Repositories\BaseRepository;

/**
 * Class ProjectFieldRepository
 * @package App\Repositories
 * @version March 11, 2021, 12:48 pm UTC
*/

class ProjectFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'field_code',
        'field_type',
        'field_text',
        'visible',
        'mandatory',
        'sequence'
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
        return ProjectField::class;
    }
}
