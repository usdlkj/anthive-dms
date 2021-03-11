<?php

namespace App\DataTables;

use App\Models\Document;

/**
 * Class DocumentDataTable
 */
class DocumentDataTable
{
    /**
     * @return Document
     */
    public function get()
    {
        /** @var Document $query */
        $query = Document::query()->select('documents.*');

        return $query;
    }
}
