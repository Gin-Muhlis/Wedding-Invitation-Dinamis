<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\WeddingCeremony;
use Illuminate\Auth\Access\HandlesAuthorization;

class WeddingCeremonyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the weddingCeremony can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list weddingceremonies');
    }

    /**
     * Determine whether the weddingCeremony can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingCeremony  $model
     * @return mixed
     */
    public function view(User $user, WeddingCeremony $model)
    {
        return $user->hasPermissionTo('view weddingceremonies');
    }

    /**
     * Determine whether the weddingCeremony can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create weddingceremonies');
    }

    /**
     * Determine whether the weddingCeremony can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingCeremony  $model
     * @return mixed
     */
    public function update(User $user, WeddingCeremony $model)
    {
        return $user->hasPermissionTo('update weddingceremonies');
    }

    /**
     * Determine whether the weddingCeremony can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingCeremony  $model
     * @return mixed
     */
    public function delete(User $user, WeddingCeremony $model)
    {
        return $user->hasPermissionTo('delete weddingceremonies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingCeremony  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete weddingceremonies');
    }

    /**
     * Determine whether the weddingCeremony can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingCeremony  $model
     * @return mixed
     */
    public function restore(User $user, WeddingCeremony $model)
    {
        return false;
    }

    /**
     * Determine whether the weddingCeremony can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\WeddingCeremony  $model
     * @return mixed
     */
    public function forceDelete(User $user, WeddingCeremony $model)
    {
        return false;
    }
}
