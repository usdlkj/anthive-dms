<?php

namespace App\DataTables;

use App\Models\ProjectUser;

/**
 * Class ProjectUserDataTable
 */
class ProjectUserDataTable
{
    /**
     * @return ProjectUser
     */
    public function get()
    {
        /** @var ProjectUser $query */
        $query = ProjectUser::query()->select('project_user.*');

        return $query;
    }
}
