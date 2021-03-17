<?php

namespace App\Repositories;

use App\Models\SelectValue;
use App\Repositories\BaseRepository;

/**
 * Class SelectValueRepository
 * @package App\Repositories
 * @version March 17, 2021, 8:53 am UTC
*/

class SelectValueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_field_id',
        'value_code',
        'value_text'
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
        return SelectValue::class;
    }
}
