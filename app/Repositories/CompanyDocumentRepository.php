<?php

namespace App\Repositories;

use App\Models\CompanyDocument;
use App\Repositories\BaseRepository;

/**
 * Class CompanyDocumentRepository
 * @package App\Repositories
 * @version March 11, 2021, 11:01 am UTC
*/

class CompanyDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'company_id',
        'document_id'
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
        return CompanyDocument::class;
    }
}
