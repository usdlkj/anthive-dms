<?php

namespace App\DataTables;

use App\Models\User;

/**
 * Class UserDataTable
 */
class UserDataTable
{
    /**
     * @return User
     */
    public function get()
    {
        /** @var User $query */
        $query = User::query()->select('users.*');

        return $query;
    }
}
