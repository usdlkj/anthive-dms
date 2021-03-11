<?php

namespace App\Repositories;

use App\Models\Mail;
use App\Repositories\BaseRepository;

/**
 * Class MailRepository
 * @package App\Repositories
 * @version March 11, 2021, 11:02 am UTC
*/

class MailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'thread_starter_id',
        'previous_mail_id',
        'mail_type_id',
        'sender_id',
        'mail_code',
        'mail_status',
        'subject',
        'message'
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
        return Mail::class;
    }
}
