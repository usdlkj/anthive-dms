<?php

namespace App\Repositories;

use App\Models\MailAttachment;
use App\Repositories\BaseRepository;

/**
 * Class MailAttachmentRepository
 * @package App\Repositories
 * @version March 11, 2021, 11:03 am UTC
*/

class MailAttachmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mail_id',
        'attachment_id',
        'attachment_type'
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
        return MailAttachment::class;
    }
}
