<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\WeddingData;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeddingDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the weddingData can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allweddingdata');
    }

    /**
     * Determine whether the weddingData can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingData  $model
     * @return mixed
     */
    public function view(User $user, WeddingData $model)
    {
        return $user->hasPermissionTo('view allweddingdata');
    }

    /**
     * Determine whether the weddingData can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allweddingdata');
    }

    /**
     * Determine whether the weddingData can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingData  $model
     * @return mixed
     */
    public function update(User $user, WeddingData $model)
    {
        return $user->hasPermissionTo('update allweddingdata');
    }

    /**
     * Determine whether the weddingData can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingData  $model
     * @return mixed
     */
    public function delete(User $user, WeddingData $model)
    {
        return $user->hasPermissionTo('delete allweddingdata');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingData  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allweddingdata');
    }

    /**
     * Determine whether the weddingData can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingData  $model
     * @return mixed
     */
    public function restore(User $user, WeddingData $model)
    {
        return false;
    }

    /**
     * Determine whether the weddingData can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingData  $model
     * @return mixed
     */
    public function forceDelete(User $user, WeddingData $model)
    {
        return false;
    }
}
