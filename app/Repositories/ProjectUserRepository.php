<?php

namespace App\Repositories;

use App\Models\ProjectUser;
use App\Repositories\BaseRepository;

/**
 * Class ProjectUserRepository
 * @package App\Repositories
 * @version March 11, 2021, 12:51 pm UTC
*/

class ProjectUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'project_id',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ProjectUser::class;
    }
}
