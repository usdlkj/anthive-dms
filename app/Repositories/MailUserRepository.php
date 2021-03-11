<?php

namespace App\Repositories;

use App\Models\MailUser;
use App\Repositories\BaseRepository;

/**
 * Class MailUserRepository
 * @package App\Repositories
 * @version March 11, 2021, 11:02 am UTC
*/

class MailUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mail_id',
        'user_id'
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
        return MailUser::class;
    }
}
