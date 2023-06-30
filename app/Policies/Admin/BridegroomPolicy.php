<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Bridegroom;
use Illuminate\Auth\Access\HandlesAuthorization;

class BridegroomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the bridegroom can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list bridegrooms');
    }

    /**
     * Determine whether the bridegroom can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bridegroom  $model
     * @return mixed
     */
    public function view(User $user, Bridegroom $model)
    {
        return $user->hasPermissionTo('view bridegrooms');
    }

    /**
     * Determine whether the bridegroom can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create bridegrooms');
    }

    /**
     * Determine whether the bridegroom can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bridegroom  $model
     * @return mixed
     */
    public function update(User $user, Bridegroom $model)
    {
        return $user->hasPermissionTo('update bridegrooms');
    }

    /**
     * Determine whether the bridegroom can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bridegroom  $model
     * @return mixed
     */
    public function delete(User $user, Bridegroom $model)
    {
        return $user->hasPermissionTo('delete bridegrooms');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bridegroom  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete bridegrooms');
    }

    /**
     * Determine whether the bridegroom can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bridegroom  $model
     * @return mixed
     */
    public function restore(User $user, Bridegroom $model)
    {
        return false;
    }

    /**
     * Determine whether the bridegroom can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bridegroom  $model
     * @return mixed
     */
    public function forceDelete(User $user, Bridegroom $model)
    {
        return false;
    }
}
