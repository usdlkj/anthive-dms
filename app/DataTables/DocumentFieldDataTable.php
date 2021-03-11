<?php

namespace App\DataTables;

use App\Models\DocumentField;

/**
 * Class DocumentFieldDataTable
 */
class DocumentFieldDataTable
{
    /**
     * @return DocumentField
     */
    public function get()
    {
        /** @var DocumentField $query */
        $query = DocumentField::query()->select('document_fields.*');

        return $query;
    }
}
