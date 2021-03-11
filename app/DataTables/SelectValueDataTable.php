<?php

namespace App\DataTables;

use App\Models\SelectValue;

/**
 * Class SelectValueDataTable
 */
class SelectValueDataTable
{
    /**
     * @return SelectValue
     */
    public function get()
    {
        /** @var SelectValue $query */
        $query = SelectValue::query()->select('select_values.*');

        return $query;
    }
}
