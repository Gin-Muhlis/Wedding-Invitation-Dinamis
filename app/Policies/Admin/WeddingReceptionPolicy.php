<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\WeddingReception;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeddingReceptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the weddingReception can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list weddingreceptions');
    }

    /**
     * Determine whether the weddingReception can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingReception  $model
     * @return mixed
     */
    public function view(User $user, WeddingReception $model)
    {
        return $user->hasPermissionTo('view weddingreceptions');
    }

    /**
     * Determine whether the weddingReception can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create weddingreceptions');
    }

    /**
     * Determine whether the weddingReception can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingReception  $model
     * @return mixed
     */
    public function update(User $user, WeddingReception $model)
    {
        return $user->hasPermissionTo('update weddingreceptions');
    }

    /**
     * Determine whether the weddingReception can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingReception  $model
     * @return mixed
     */
    public function delete(User $user, WeddingReception $model)
    {
        return $user->hasPermissionTo('delete weddingreceptions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingReception  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete weddingreceptions');
    }

    /**
     * Determine whether the weddingReception can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingReception  $model
     * @return mixed
     */
    public function restore(User $user, WeddingReception $model)
    {
        return false;
    }

    /**
     * Determine whether the weddingReception can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingReception  $model
     * @return mixed
     */
    public function forceDelete(User $user, WeddingReception $model)
    {
        return false;
    }
}
