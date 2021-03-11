<?php

namespace App\DataTables;

use App\Models\MailAttachment;

/**
 * Class MailAttachmentDataTable
 */
class MailAttachmentDataTable
{
    /**
     * @return MailAttachment
     */
    public function get()
    {
        /** @var MailAttachment $query */
        $query = MailAttachment::query()->select('mail_attachments.*');

        return $query;
    }
}
