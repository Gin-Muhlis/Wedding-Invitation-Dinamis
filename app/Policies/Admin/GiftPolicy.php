<?php

namespace App\Policies\Admin;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GiftPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the gift can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list gifts');
    }

    /**
     * Determine whether the gift can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gift  $model
     * @return mixed
     */
    public function view(User $user, Gift $model)
    {
        return $user->hasPermissionTo('view gifts');
    }

    /**
     * Determine whether the gift can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create gifts');
    }

    /**
     * Determine whether the gift can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gift  $model
     * @return mixed
     */
    public function update(User $user, Gift $model)
    {
        return $user->hasPermissionTo('update gifts');
    }

    /**
     * Determine whether the gift can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gift  $model
     * @return mixed
     */
    public function delete(User $user, Gift $model)
    {
        return $user->hasPermissionTo('delete gifts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gift  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete gifts');
    }

    /**
     * Determine whether the gift can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gift  $model
     * @return mixed
     */
    public function restore(User $user, Gift $model)
    {
        return false;
    }

    /**
     * Determine whether the gift can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Gift  $model
     * @return mixed
     */
    public function forceDelete(User $user, Gift $model)
    {
        return false;
    }
}
