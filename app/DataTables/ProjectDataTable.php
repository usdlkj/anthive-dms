<?php

namespace App\DataTables;

use App\Models\Project;

/**
 * Class ProjectDataTable
 */
class ProjectDataTable
{
    /**
     * @return Project
     */
    public function get()
    {
        /** @var Project $query */
        $query = Project::query()->select('projects.*');

        return $query;
    }
}
