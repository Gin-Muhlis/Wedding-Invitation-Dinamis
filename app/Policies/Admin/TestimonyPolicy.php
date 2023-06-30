<?php

namespace App\Policies\Admin;

use App\Models\User;
use App\Models\Testimony;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the testimony can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list testimonies');
    }

    /**
     * Determine whether the testimony can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Testimony  $model
     * @return mixed
     */
    public function view(User $user, Testimony $model)
    {
        return $user->hasPermissionTo('view testimonies');
    }

    /**
     * Determine whether the testimony can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create testimonies');
    }

    /**
     * Determine whether the testimony can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Testimony  $model
     * @return mixed
     */
    public function update(User $user, Testimony $model)
    {
        return $user->hasPermissionTo('update testimonies');
    }

    /**
     * Determine whether the testimony can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Testimony  $model
     * @return mixed
     */
    public function delete(User $user, Testimony $model)
    {
        return $user->hasPermissionTo('delete testimonies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Testimony  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete testimonies');
    }

    /**
     * Determine whether the testimony can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Testimony  $model
     * @return mixed
     */
    public function restore(User $user, Testimony $model)
    {
        return false;
    }

    /**
     * Determine whether the testimony can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Testimony  $model
     * @return mixed
     */
    public function forceDelete(User $user, Testimony $model)
    {
        return false;
    }
}
