<?php

namespace App\DataTables;

use App\Models\ProjectField;

/**
 * Class ProjectFieldDataTable
 */
class ProjectFieldDataTable
{
    /**
     * @return ProjectField
     */
    public function get()
    {
        /** @var ProjectField $query */
        $query = ProjectField::query()->select('project_fields.*');

        return $query;
    }
}
