<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Theme;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThemePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the theme can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list themes');
    }

    /**
     * Determine whether the theme can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Theme  $model
     * @return mixed
     */
    public function view(User $user, Theme $model)
    {
        return $user->hasPermissionTo('view themes');
    }

    /**
     * Determine whether the theme can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create themes');
    }

    /**
     * Determine whether the theme can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Theme  $model
     * @return mixed
     */
    public function update(User $user, Theme $model)
    {
        return $user->hasPermissionTo('update themes');
    }

    /**
     * Determine whether the theme can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Theme  $model
     * @return mixed
     */
    public function delete(User $user, Theme $model)
    {
        return $user->hasPermissionTo('delete themes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Theme  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete themes');
    }

    /**
     * Determine whether the theme can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Theme  $model
     * @return mixed
     */
    public function restore(User $user, Theme $model)
    {
        return false;
    }

    /**
     * Determine whether the theme can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Theme  $model
     * @return mixed
     */
    public function forceDelete(User $user, Theme $model)
    {
        return false;
    }
}
