<?php

namespace App\Repositories;

use App\Models\MailType;
use App\Repositories\BaseRepository;

/**
 * Class MailTypeRepository
 * @package App\Repositories
 * @version March 11, 2021, 2:15 pm UTC
*/

class MailTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'mail_type',
        'mail_type_code',
        'last_mail_number',
        'is_transmittal'
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
        return MailType::class;
    }
}
