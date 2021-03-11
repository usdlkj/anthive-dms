<?php

namespace App\DataTables;

use App\Models\Company;

/**
 * Class CompanyDataTable
 */
class CompanyDataTable
{
    /**
     * @return Company
     */
    public function get()
    {
        /** @var Company $query */
        $query = Company::query()->select('companies.*');

        return $query;
    }
}
