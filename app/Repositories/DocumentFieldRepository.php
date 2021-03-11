<?php

namespace App\Repositories;

use App\Models\DocumentField;
use App\Repositories\BaseRepository;

/**
 * Class DocumentFieldRepository
 * @package App\Repositories
 * @version March 11, 2021, 11:01 am UTC
*/

class DocumentFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'document_id',
        'field_code',
        'field_value'
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
        return DocumentField::class;
    }
}
