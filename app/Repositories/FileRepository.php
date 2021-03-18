<?php

namespace App\Repositories;

use App\Models\File;
use App\Repositories\BaseRepository;

/**
 * Class FileRepository
 * @package App\Repositories
 * @version March 18, 2021, 10:04 am UTC
*/

class FileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'file_name',
        'file_hash',
        'location',
        'file_size',
        'extension'
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
        return File::class;
    }
}
