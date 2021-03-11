<?php

namespace App\DataTables;

use App\Models\CompanyDocument;

/**
 * Class CompanyDocumentDataTable
 */
class CompanyDocumentDataTable
{
    /**
     * @return CompanyDocument
     */
    public function get()
    {
        /** @var CompanyDocument $query */
        $query = CompanyDocument::query()->select('company_document.*');

        return $query;
    }
}
