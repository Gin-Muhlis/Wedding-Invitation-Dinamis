<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisitorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the visitor can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list visitors');
    }

    /**
     * Determine whether the visitor can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visitor  $model
     * @return mixed
     */
    public function view(User $user, Visitor $model)
    {
        return $user->hasPermissionTo('view visitors');
    }

    /**
     * Determine whether the visitor can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create visitors');
    }

    /**
     * Determine whether the visitor can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visitor  $model
     * @return mixed
     */
    public function update(User $user, Visitor $model)
    {
        return $user->hasPermissionTo('update visitors');
    }

    /**
     * Determine whether the visitor can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visitor  $model
     * @return mixed
     */
    public function delete(User $user, Visitor $model)
    {
        return $user->hasPermissionTo('delete visitors');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visitor  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete visitors');
    }

    /**
     * Determine whether the visitor can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visitor  $model
     * @return mixed
     */
    public function restore(User $user, Visitor $model)
    {
        return false;
    }

    /**
     * Determine whether the visitor can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Visitor  $model
     * @return mixed
     */
    public function forceDelete(User $user, Visitor $model)
    {
        return false;
    }
}
