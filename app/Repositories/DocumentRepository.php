<?php

namespace App\Repositories;

use App\Models\Document;
use App\Repositories\BaseRepository;

/**
 * Class DocumentRepository
 * @package App\Repositories
 * @version March 19, 2021, 6:20 am UTC
*/

class DocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'document_code',
        'project_id',
        'file_id',
        'version',
        'latest_version'
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
        return Document::class;
    }
}
