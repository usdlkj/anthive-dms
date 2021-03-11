<?php

namespace App\DataTables;

use App\Models\MailType;

/**
 * Class MailTypeDataTable
 */
class MailTypeDataTable
{
    /**
     * @return MailType
     */
    public function get()
    {
        /** @var MailType $query */
        $query = MailType::query()->select('mail_types.*');

        return $query;
    }
}
