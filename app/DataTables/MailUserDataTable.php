<?php

namespace App\DataTables;

use App\Models\MailUser;

/**
 * Class MailUserDataTable
 */
class MailUserDataTable
{
    /**
     * @return MailUser
     */
    public function get()
    {
        /** @var MailUser $query */
        $query = MailUser::query()->select('mail_user.*');

        return $query;
    }
}
