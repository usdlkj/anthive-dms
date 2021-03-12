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
        $columns = ['id', 'company_name', 'trading_name', 'company_code', 'city', 'country', 'phone_number', 'email'];
        $query = Company::query()->select($columns);

        return $query;
    }
}
