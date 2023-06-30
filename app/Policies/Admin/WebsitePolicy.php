<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Website;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the website can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list websites');
    }

    /**
     * Determine whether the website can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Website  $model
     * @return mixed
     */
    public function view(User $user, Website $model)
    {
        return $user->hasPermissionTo('view websites');
    }

    /**
     * Determine whether the website can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create websites');
    }

    /**
     * Determine whether the website can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Website  $model
     * @return mixed
     */
    public function update(User $user, Website $model)
    {
        return $user->hasPermissionTo('update websites');
    }

    /**
     * Determine whether the website can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Website  $model
     * @return mixed
     */
    public function delete(User $user, Website $model)
    {
        return $user->hasPermissionTo('delete websites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Website  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete websites');
    }

    /**
     * Determine whether the website can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Website  $model
     * @return mixed
     */
    public function restore(User $user, Website $model)
    {
        return false;
    }

    /**
     * Determine whether the website can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Website  $model
     * @return mixed
     */
    public function forceDelete(User $user, Website $model)
    {
        return false;
    }
}
