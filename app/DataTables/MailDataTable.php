<?php

namespace App\DataTables;

use App\Models\Mail;

/**
 * Class MailDataTable
 */
class MailDataTable
{
    /**
     * @return Mail
     */
    public function get()
    {
        /** @var Mail $query */
        $query = Mail::query()->select('mails.*');

        return $query;
    }
}
