<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        return $user->role == User::ROLE_SUPER_ADMIN;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == User::ROLE_OPS_ADMIN ||
            $user->role == User::ROLE_COMPANY_ADMIN ||
            $user->role == User::ROLE_MANAGER;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $user->role == User::ROLE_OPS_ADMIN ||
            ($user->role == User::ROLE_COMPANY_ADMIN && $user->company_id == $model->company_id) ||
            ($user->role == User::ROLE_MANAGER && $user->company_id == $model->company_id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == User::ROLE_OPS_ADMIN ||
            ($user->role == User::ROLE_COMPANY_ADMIN && $user->company_id == $model->company_id) ||
            ($user->role == User::ROLE_MANAGER && $user->company_id == $model->company_id);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->role == User::ROLE_OPS_ADMIN ||
            ($user->role == User::ROLE_COMPANY_ADMIN && $user->company_id == $model->company_id) ||
            ($user->role == User::ROLE_MANAGER && $user->company_id == $model->company_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->role == User::ROLE_OPS_ADMIN ||
            ($user->role == User::ROLE_COMPANY_ADMIN && $user->company_id == $model->company_id) ||
            ($user->role == User::ROLE_MANAGER && $user->company_id == $model->company_id);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return $user->role == User::ROLE_OPS_ADMIN;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return false;
    }
}
